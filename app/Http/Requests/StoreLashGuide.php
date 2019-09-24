<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLashGuide extends FormRequest
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
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'step_id' => 'required|numeric|gt:0' 
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Tên không được để trống',
            'image.required' => 'Hình ảnh không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'step_id.*' => 'Bước gợi ý không được để trống'
        ];
    }
}
