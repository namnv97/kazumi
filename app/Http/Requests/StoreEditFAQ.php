<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
use App\Model\User;

class StoreEditFAQ extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(!Auth::check()) return false;
        $user = User::find(Auth::user()->id);
        if($user->hasRole('admin') || $user->hasRole('superadmin')) return true;
        return false;;
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
            'slug' => 'required|unique:pages,slug,'.$this->id,
            'shipping_title' => 'required',
            'returnex_title' => 'required',
            'product_title' => 'required',
            'payment_title' => 'required',
            'contact_title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tiêu đề trang',
            'slug' => 'Đường dẫn trang',
            'shipping_title' => 'Tiêu đề shipping',
            'returnex_title' => 'Tiêu đề return & exchanges',
            'product_title' => 'Tiêu đề product',
            'payment_title' => 'Tiêu đề payment',
            'contact_title' => 'Tiêu đề contact',
        ];
    }
}
