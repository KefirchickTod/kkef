<?php


namespace App\Repositories\Kk\Article;


use App\Models\Kk\Article;
use App\Repositories\CoreRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleRepository extends CoreRepository
{

    const default_paginator = 10;

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Article::class;
    }

    /**
     * @param $id
     * @return Article
     */
    public function getEdit($id){
        return $this->startConditions()->find($id);
    }
    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($columns = null){
        $columns = $columns ?: [
            'id',
            'category_id',
            'user_id',
            'title',
            'public',
            'created_at'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->with([
                'category' =>  function($query){
                    $query->select(['id', 'title']);
                }
            ])
            ->orderBy('id', 'DESC')
            ->paginate(self::default_paginator);

        return $result;
    }
}
