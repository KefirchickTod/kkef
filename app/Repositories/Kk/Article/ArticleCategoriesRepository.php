<?php


namespace App\Repositories\Kk\Article;


use App\Models\Kk\ArticleCategory;
use App\Repositories\CoreRepository;

class ArticleCategoriesRepository extends CoreRepository
{


    public function getForComBox(){
        $columns = join(', ',[
            'id',
            'CONCAT (id, ". ", title) AS title'
        ]);

        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

       // dd($result);
        return $result;
    }

    protected function getModelClass()
    {
       return ArticleCategory::class;
    }
}
