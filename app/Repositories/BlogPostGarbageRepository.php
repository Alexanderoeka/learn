<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use App\Repositories\CoreRepository;

class BlogPostGarbageRepository extends CoreRepository
{

    protected function getModelClass()
    {

        return Model::class;
    }

    public function getTrashPaginate($amount)
    {
        $query = $this->startConditions()->onlyTrashed()
            ->paginate($amount);
        return $query;
    }
}
