<?php

namespace App\Services\Loan;

use App\Models\installment;
use App\Models\Loan;
use LaravelEasyRepository\Service;
use App\Repositories\Loan\LoanRepository;
use Carbon\Carbon;

class LoanServiceImplement extends Service implements LoanService{

    public function storeLoanAndImplements(array $data)
    {
      // This is logic
      $loan = Loan::create($data);

      foreach (range(1, $loan->long_installment) as $i) {
        $this->createInstallment($loan , $i);   
      }

    }

    private function createInstallment($loan , $i)
    {
          $installment = installment::create([
              'user_id' => $loan->user_id,
              'month' => Carbon::now()->addMonths($i-0)->format('F'),
              'amount' => $loan->total_installment,
              'status' => 'Unpaid'
          ]); 

          return $installment;
    }
}
