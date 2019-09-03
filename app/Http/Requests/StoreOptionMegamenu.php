<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionMegamenu extends FormRequest
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
            'mega_title' => 'required',
            'mega_link' => 'required',
            'mega_content' => 'required',
            'mega_product' => 'required',
            'mega_product_title' => 'required',
            'mega_product_note' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống'
        ];
    }

    public function attributes()
    {
        return [
            'mega_title' => 'Tiêu đề',
            'mega_link' => 'Link',
            'mega_content' => 'Nội dung',
            'mega_product' => 'Sản phẩm',
            'mega_product_title' => 'Tiêu đề sản phẩm',
            'mega_product_note' => 'Ghi chú sản phẩm'
        ];
    }
}
