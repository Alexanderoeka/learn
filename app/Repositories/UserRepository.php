<?php


namespace App\Repositories;

use App\Models\User as Model;

class UserRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllUsers(){
        return $this->startConditions()->select('*')
        ->toBase()
        ->get();
    }

}
