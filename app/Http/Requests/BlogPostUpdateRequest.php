<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostUpdateRequest extends FormRequest
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
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'category_id' => 'integer|required|exists:blog_categories,id',
            'user_id' => 'integer|required|exists:users,id',
            'content_raw' => 'string|min:3|max:10000',
            'excerpt' => 'string',
            'is_published'=>'string'
        ];
    }

    public function setIsPublished(&$data)
    {
        if (!empty($data['is_published'])) {
            $data['is_published'] = 1;
        } else {
            $data['is_published'] = 0;
        }

    }
}
