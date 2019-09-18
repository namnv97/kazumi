<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateVoucher extends FormRequest
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
            'name' => 'required',
            'point' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề không được để trống',
            'point.requried' => 'Điểm quy đổi không được để trống',
            'point.numeric' => 'Điểm quy đổi là số'
        ];
    }
}
