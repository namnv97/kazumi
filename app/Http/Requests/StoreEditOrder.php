<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;

class StoreEditOrder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check()) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'city' => 'required',
            'phone' => 'required'
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
            'first_name' => 'Họ',
            'last_name' => 'Tên',
            'address1' => 'Địa chỉ 1',
            'address2' => 'Địa chỉ 2',
            'city' => 'Tỉnh/Thành phố',
            'phone' => 'Số điện thoại'
        ];
    }
}
