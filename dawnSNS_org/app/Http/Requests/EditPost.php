<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    This action is unauthorized.エラーを防ぐためにtrueに変更
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
            'newPost' => 'required|string|max:140',
        ];
    }
}
