<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRetailer extends FormRequest
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
            'phone' => 'required',
            'website' => 'required',
            'bussiness_year' => 'required|numeric',
            'address' => 'required',
            'city_id' => 'required|numeric|gte:1',
            'fullname' => 'required',
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'numeric' => ':attribute phải là số',
            'gte' => ':atttribute không được để trống',
            'email' => ':attribute sai định dạng'
        ];
    }

    public function attributes()
    {
        return [
            'name' => "Tên đại lý",
            'phone' => 'Số điện thoại',
            'website' => 'Website',
            'bussiness_year' => 'Năm hoạt động',
            'address' => 'Địa chỉ',
            'city_id' => 'Thành phố',
            'fullname' => 'Họ tên người đăng ký',
            'email' => 'Email đăng ký'
        ];
    }
}
