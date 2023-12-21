<?php

namespace App\Services\Deposit;

use App\Enum\TypeSavingEnum;
use App\Models\Deposit;
use App\Models\User;
use LaravelEasyRepository\Service;

class DepositServiceImplement extends Service implements DepositService{

     /**
     * don't change $this->mainRepository variable name
     * because used in extends service class
     */

    public function __construct()
    {
      
    }

    // Define your custom methods :)

    public function getDepositHistory(): array
    {

      $users = User::has('deposits')->get();

       return $users->map(function ($user) {
          return [
              'user' => $user,
              'data' => [
                  'simpanan_pokok' => $this->whereClause($user->id, TypeSavingEnum::PRINCIPAL),
                  'simpanan_wajib' => $this->whereClause($user->id, TypeSavingEnum::MANDATORY),
                  'simpanan_sukarela' => $this->whereClause($user->id, TypeSavingEnum::VOLUNTARY),
                  'total_simpanan' => $this->getTotalAmount($user->id, [TypeSavingEnum::PRINCIPAL, TypeSavingEnum::MANDATORY, TypeSavingEnum::VOLUNTARY]),
              ]
          ];
      })->toArray();

    }

    private function getTotalAmount($userId, $type)
    {

      return Deposit::whereIn('type', (array) $type)
                                    ->where('user_id', $userId)
                                    ->sum('total_amount');
    }

  

    public static function whereClause( ?string $user_id, $type_deposit)
    {
      
         return Deposit::where('type', $type_deposit)
                        ->where('user_id', $user_id)
                        ->sum('total_amount');
    }
}
