<?php


namespace App\Repositories;

use App\models\BlogPost as Model;

class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getPaginateForList($amount)
    {
        $fields = [
            'id',
            'title',
            'user_id',
            'is_published',
            'published_at',
            'category_id'
        ];
        $query = $this->startConditions()
            ->select($fields)
            ->orderBy('id', 'DESC')
            // ->with(['category', 'user'])
            ->with([
                'category' => function ($query) {

                    $query->select(['id', 'title']);
                },
                'user:id,name'

            ])
            ->paginate($amount);


        return $query;
    }

























    public function getDataofPostbyId($id)
    {
        $result = $this->startConditions()->select('title', 'user_id', 'is_published', 'content_raw', 'published_at', 'created_at')
            ->where('id', $id)
            ->toBase()
            ->get();

        return $result;
    }
}
