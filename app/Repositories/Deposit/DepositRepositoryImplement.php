<?php

namespace App\Repositories\Deposit;

use App\Enum\TypeSavingEnum;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class DepositRepositoryImplement extends Eloquent implements DepositRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Deposit $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)
    public function getAll(): EloquentCollection
    {
        return $this->model->all();
    }

    public function TypeSaving() 
    {
        $type = array_map(
        fn (TypeSavingEnum $term) => $term->value,
        TypeSavingEnum::cases()
        );
        return $type;
    }

    public function storeDeposit(array $data)
    {
        return $this->model->create($data);
    }

    public function getDepositHistoryByUserId(string $id)
    {
        return $this->model->where('user_id', $id)
                    ->select('id', 'type', 'total_amount', 'created_at')
                    ->orderBy('created_at', 'desc')
                    ->get();
    }
}
