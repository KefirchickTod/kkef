<?php

use Illuminate\Database\Seeder;

class ArticleCategories extends Seeder
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

        ];
        DB::table('article_categories')->insert($categories);
    }
}
