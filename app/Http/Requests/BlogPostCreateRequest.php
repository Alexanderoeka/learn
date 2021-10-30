<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:200|unique:blog_posts',
            'slug' => 'max:200',
            'user_id' => 'integer|required|exists:users,id',
            'category_id' => 'integer|required|exists:blog_categories,id',
            'content_raw' => 'string|min:3|max:10000',
            'excerpt' => 'string'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Enter title of post',
            'content_raw.min' => 'Min length of post is [:min] symvols'
        ];
    }
    public function attribute()
    {

        return [
            'title' => 'Заголовок'
        ];
    }
}
