<?php

namespace App\Repositories\Loan;

use App\Models\Installment;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\Loan;
use App\Models\User;

class LoanRepositoryImplement extends Eloquent implements LoanRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Loan $model)
    {
        $this->model = $model;
    }

    // Write something awesome :)

    public function getloan()
    {
       return $this->model->with('user', 'interest')->get();
    }


    public function getUser(string $id)
    {
        return User::whereHas('roles', function($query){
                    $query->where('name', 'member');
                })
                ->find($id, ['id', 'name']);
    }

    public function getInstallmentList(string $id)
    {
        return Installment::with('user')->where('user_id', $id);
    }

    public function updateInstallment(string $id, string $user_id)
    {
        return Installment::where(['id' => $id , 'user_id' => $user_id ])
                            ->first()
                            ->update(['status' => 'Paid']);
    }
}
