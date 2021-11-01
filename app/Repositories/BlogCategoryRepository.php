<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\collection;
use Illuminate\Support\Facades\DB;

use App\Repositories\CoreRepository;


class BlogCategoryRepository extends CoreRepository
{


    /**
     *@return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
    /**
     * Получить модель для редактирования в админке
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
    /**
     * Получить список категорий для вывода в выпадающем списке
     */
    public function getForComboBox()
    {
        $fields = implode(', ', ['id', 'CONCAT(id,". ", title) AS id_title']);


        $result = $this
            ->startConditions()
            ->select(
                'id',
                DB::raw('CONCAT(id,\'. \',title) AS id_title')
            )
            ->toBase()
            ->get();



        return $result;
    }

    public function getAllWithpaginate($amount = null)
    {
        $fields = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()
            ->select($fields)
            ->with(['parentCategory' => function ($query) {
                $query->select(['id','title']);
            }])
            ->paginate($amount);


        return $result;
    }
}
