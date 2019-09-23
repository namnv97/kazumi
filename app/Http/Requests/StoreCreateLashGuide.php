<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreateLashGuide extends FormRequest
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
            'slug' => 'required|unique:pages,slug',
            'sub_title' => 'required',
            'background' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề trang không được để trống',
            'slug.required' => 'Đường dẫn trang không được để trống',
            'slug.unique' => 'Đường dẫn trang đã tồn tại',
            'sub_title.required' => 'Tiêu đề nhỏ không được để trống',
            'background.required' => 'Ảnh nền không được để trống',
            'description.required' => 'Mô tả không được để trống'
        ];
    }


}
