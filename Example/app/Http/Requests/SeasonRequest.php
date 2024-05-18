<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeasonRequest extends FormRequest
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
            //
            'season_name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return[
            'season_name.required' => 'Tên mùa bắt buộc phải điển'
        ];
    }
}
