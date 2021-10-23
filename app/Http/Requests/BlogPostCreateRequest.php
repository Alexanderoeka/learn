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
            'title'=>'required|min:3|max:30',
            'slug'=>'required|min:3|max:30',
            'user_id' =>'integer|required|exists:users,id',
            'category_id'=>'integer|required|exists:blog_categories,id',
           'content_raw' =>'string|min:3|max:5000',
           'excerpt'=>'string'
        ];
    }
}
