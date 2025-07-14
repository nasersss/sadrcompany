<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDisplayCommentRequest extends FormRequest
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
        return [
            'name'=>'required|max:30',
            'title_ar'=>'required|max:50',
            'title_en'=>'required|max:50',
            'comment_ar'=>'required|max:200',
            'comment_en'=>'required|max:200',
            'star'=>'required'
        ];
    }
}
