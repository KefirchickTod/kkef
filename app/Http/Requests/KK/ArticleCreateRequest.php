<?php

namespace App\Http\Requests\Kk;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|unique:articles',
            'slug' => 'max:200',
            'full_text' => 'string|min:5',
            'short_text' => 'string|min:5',
            'category_id' => 'required|integer|exists:article_categories,id'
        ];
    }
}
