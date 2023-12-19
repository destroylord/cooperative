<?php

namespace App\Repositories\Loan;

use LaravelEasyRepository\Repository;

interface LoanRepository extends Repository{

    // Write something awesome :)

    public function getloan();

    public function getUser(string $id);

    public function getInstallmentList(string $id);

    public function updateInstallment(string $id, string $user_id);
}
