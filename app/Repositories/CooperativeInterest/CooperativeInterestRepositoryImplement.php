<?php

namespace App\Repositories\CooperativeInterest;

use LaravelEasyRepository\Implementations\Eloquent;
use App\Models\CooperativeInterest;
use Illuminate\Database\Eloquent\Collection;

class CooperativeInterestRepositoryImplement extends Eloquent implements CooperativeInterestRepository{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(CooperativeInterest $model)
    {
        $this->model = $model;
    }

    /**
     * Retrieves all the CooperativeInterest records.
     *
     * @return Collection The collection of CooperativeInterest records.
     */
    public function getAll() :Collection {

        return CooperativeInterest::select('id', 'total_interest')->get();
        
    }

    /**
     * Retrieves a CooperativeInterest object from the database by its ID.
     *
     * @param int $id The ID of the CooperativeInterest to retrieve.
     * @return CooperativeInterest|null The retrieved CooperativeInterest object, or null if not found.
     */
    public function getById(int $id) : ?CooperativeInterest{
        return $this->model->find($id);
    }

   
    public function deleteInterest(CooperativeInterest $ids) {
       return $ids->delete();
    }
}
