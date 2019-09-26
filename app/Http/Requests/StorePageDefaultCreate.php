<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePageDefaultCreate extends FormRequest
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
            'page_content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tiêu đề trang không được để trống',
            'slug.required' => 'Đường dẫn trang không được để trống',
            'slug.unique' => 'Đường dẫn trang đã tồn tại',
            'page_content.required' => 'Nội dung không được để trống'
        ];
    }
}
