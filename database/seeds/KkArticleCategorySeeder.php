<?php

use Illuminate\Database\Seeder;

class KkArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $categoriesName = 'Без категории';
        $categories[] = [
            'title' => $categoriesName,
            'slug' => Str::slug($categoriesName),
            'parent_id' => 0
        ];
        foreach(range(1, 10) as $i){
            $categoriesName = "Категория $i";
            $parent_id  = ($i > 4) ? rand(1, 4) : 1;
            $categories[] = [
                'title' => $categoriesName,
                'slug' => Str::slug($categoriesName),
                'parent_id' => $parent_id
            ];
        }
        DB::table('kk_article_categories')->insert($categories);
    }
}
