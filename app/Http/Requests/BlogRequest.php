<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ( request()->method() === 'POST' )
        {
            $rules = [
                'title' => 'required|max:255|string|unique:posts,title',
                'slug' => 'required|max:255|unique:posts,slug',
                'image' => 'required|mimes:png,jpeg,jpg,gif,svg',
                'body'  => 'required',
                'excerpt' => 'required',
                'status' => 'required|max:255'
            ];
        }
        else
        {
            $rules = [
                'title' => 'sometimes|max:255|string',
                'slug' => 'sometimes|max:255',
                'image' => 'sometimes|mimes:png,jpeg,jpg,gif,svg',
                'body'  => 'sometimes',
                'excerpt' => 'sometimes',
                'status' => 'sometimes|max:255'
            ];

            if ( request()->has('image') )
            {
                $rules[] = 'mimes:png,jpeg,jpg,gif,svg';
            }
        }

        return $rules;
    }
}
