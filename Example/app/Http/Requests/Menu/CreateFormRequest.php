<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreateFormRequest extends FormRequest
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
            'disease_name' => 'required|string|max:255',
            'overview' => 'required|string',
            'learn_general' => 'required|string',
            'symptom' => 'required|string',
            'reason' => 'required|string',
            'risk' => 'required|string',
            'diagnose' => 'required|string',
            'prevent' => 'required|string',
            'season_id' => 'required|array',
            'object_id' => 'required|array',

        ];
    }
    public function messages()
    {
        return[
            'disease_name.required' => 'Vui lòng nhập tên bệnh',
            'overview.required' => 'Vui lòng nhập tổng quan về bệnh',
            'learn_general.required' => 'Vui lòng nhập tìm hiểu chung về bệnh',
            'symptom.required' => 'Vui lòng nhập triệu chứng',
            'reason.required' => 'Vui lòng nhập nguyên nhân',
            'risk.required' => 'Vui lòng nhập nguy cơ',
            'diagnose.required' => 'Vui lòng nhập chuẩn đoán',
            'prevent.required' => 'Vui lòng nhập phòng ngừa',
            'season_id.required' => 'Vui lòng chọn mùa',
            'object_id.required' => 'Vui lòng chọn đối tượng'
        ];
    }
}
