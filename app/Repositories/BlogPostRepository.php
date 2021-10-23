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



    public function getforEdit($id)
    {
        $one = $this->startConditions()->select(
            'id',
            'category_id',
            'user_id',
            'title',
            'content_raw',
            'is_published',
            'slug'
        )->where('id',$id)
        ->get();
        $one=$one['0'];
            return $one;

    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
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
