<?php

namespace App\Repositories\Deposit;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use LaravelEasyRepository\Repository;

interface DepositRepository extends Repository{

    // Write something awesome :)
    public function getAll(): EloquentCollection;
    public function typeSaving();

    public function storeDeposit(array $data);
    public function getDepositHistoryByUserId(string $id);
}
