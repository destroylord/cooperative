<?php

namespace App\Services\Deposit;

use LaravelEasyRepository\BaseService;

interface DepositService extends BaseService{

    // Write something awesome :)

    public function getDepositHistory(): array;
}
