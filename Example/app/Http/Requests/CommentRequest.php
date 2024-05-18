<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => 'required',
            'disease_id' => 'required|exists:diseases,id',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Comment không được để trống',
            'disease_id.required' => 'Người dùng không được để trống'
        ];
    }
}
