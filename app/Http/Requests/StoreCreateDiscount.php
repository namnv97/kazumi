<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateDiscount extends FormRequest
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
            'code' => 'required|unique:discounts,code',
            'description' => 'required',
            'type' => 'required',
            'discount_value' => 'required|numeric',
            'date_end' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
            'numeric' => ':attribute phải là số'
        ];
    }

    public function attributes(){
        return [
            'code' => 'Mã giảm giá',
            'description' => 'Mô tả mã giảm giá',
            'type' => 'Kiểu giảm giá',
            'discount_value' => 'Giá trị giảm giá',
            'date_end' =>' Ngày hết hạn'
        ];
    }
}
