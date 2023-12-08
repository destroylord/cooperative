<?php

namespace App\Repositories\CooperativeInterest;

use App\Models\CooperativeInterest;
use Illuminate\Database\Eloquent\Collection;
use LaravelEasyRepository\Repository;

interface CooperativeInterestRepository extends Repository{

    // Write something awesome :)

    public function getAll(): Collection;

    public function getById(int $id): ?CooperativeInterest;

    public function deleteInterest(CooperativeInterest $cooperativeInterests);
}
