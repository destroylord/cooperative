<?php

namespace App\Repositories\Loan;

use LaravelEasyRepository\Repository;

interface LoanRepository extends Repository{

    // Write something awesome :)

    public function getloan();
    public function storeLoan(array $data);
    public function getUser(string $id);
}
