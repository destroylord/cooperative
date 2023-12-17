<?php

namespace App\Repositories\Loan;

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

    public function getUser(string $id)
    {
        return User::whereHas('roles', function($query){
                    $query->where('name', 'member');
                })
                ->find($id, ['id', 'name']);
    }
}
