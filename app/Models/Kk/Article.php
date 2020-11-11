<?php

namespace App\Models\Kk;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{

    use SoftDeletes;


    protected $fillable = [
        'title',
        'category_id',
        'short_text',
        'full_text',
        'slug',
        'user_id',
        'published_at',
    ];

    protected $dates = [
        'published_at',
        'crated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(ArticleCategory::class);
    }

    /**
     * @return string
     * Accessor
     */
    public function getPublicStatusAttribute(){
        $status = $this->isPublic() ? "Public" : "Hidden";
        return $status;
    }

    private function isPublic(){
        return intval($this->public) === 1;
    }
}
