<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
use App\Model\User;

class StoreAddRetailer extends FormRequest
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
            'name' => 'required',
            'slug' => 'required|unique:pages,slug',
            'page_title' => 'required',
            'page_description' => 'required',
            'become_title' => 'required',
            'become_description' => 'required'
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
            'page_title' => 'Tiêu đề banner',
            'page_description' => 'Mô tả',
            'become_title' => 'Tiêu đề đăng ký',
            'become_description' => 'Mô tả đăng ký'
        ];
    }

}
