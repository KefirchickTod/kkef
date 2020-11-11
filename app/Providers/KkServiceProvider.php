<?php

namespace App\Providers;

use App\Models\Kk\Article;
use App\Observers\Kk\ArticleObserver;
use Illuminate\Support\ServiceProvider;

class KkServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       // Article::observe(ArticleObserver::class);


    }
}
