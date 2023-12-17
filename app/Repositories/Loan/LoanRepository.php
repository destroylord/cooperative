<?php

namespace App\Repositories\Loan;

use LaravelEasyRepository\Repository;

interface LoanRepository extends Repository{

    // Write something awesome :)

    public function getUser(string $id);
}
