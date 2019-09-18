<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditDiscount extends FormRequest
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
            'id' => 'required|numeric',
            'description' => 'required',
            'date_end' => 'required'
        ];
    }

    public function messages(){
        return [
            'id.required' => 'ID không được trống',
            'description.required' => 'Mô tả không được để trống',
            'date_end.required' => 'Ngày hết hạn không được để trống',
            'id.numeric' => 'Id phải là 1 số' 
        ];
    }
}
