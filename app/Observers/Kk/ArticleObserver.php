<?php

namespace App\Observers\Kk;

use App\Models\Kk\Article;
use Carbon\Carbon;

class ArticleObserver
{
    /**
     * Handle the article pre creating note events
     * @param Article $article
     * @return void
     */
    public function creating(Article $article){



        $this->setSlug($article);

        $this->setAuthorId($article);

        $this->setPublishedAt($article);

    }

    /**
     * @param Article $article
     */
    private function setSlug(Article $article){
        if(empty($article->slug)){
            $article->slug = \Str::slug($article->title);
        }
    }

    /**
     * @param Article $article
     */
    private function setAuthorId(Article $article){
        if(!$article->getAttribute('user_id')){
            $article->setAttribute('user_id', 1);
        }
    }

    private function setPublishedAt(Article $article){
        if (empty($article->published_at) && $article->public) {
            $article->setAttribute('published_at', Carbon::now());
        }
    }






    /**
     * Handle the article "created" event.
     *
     * @param  \App\Models\Kk\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        //
    }

    /**
     * Handle the article "updated" event.
     *
     * @param  \App\Models\Kk\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        //
    }

    /**
     * Handle the article "deleted" event.
     *
     * @param  \App\Models\Kk\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        //
    }

    /**
     * Handle the article "restored" event.
     *
     * @param  \App\Models\Kk\Article  $article
     * @return void
     */
    public function restored(Article $article)
    {
        //
    }

    /**
     * Handle the article "force deleted" event.
     *
     * @param  \App\Models\Kk\Article  $article
     * @return void
     */
    public function forceDeleted(Article $article)
    {
        //
    }
}
