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
}
