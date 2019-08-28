<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Model\User;

class StoreAddReward extends FormRequest
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
            'name'=> 'required',
            'slug' => 'required|unique:pages,slug',
            'banner' => 'required',
            'banner_title' => 'required',
            'earn_title' => 'required',
            'earn_description' => 'required',
            'earn_img' => 'required'
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
            'banner' => 'Banner',
            'banner_title' => 'Banner tiêu đề',
            'earn_title' => 'Tiêu đề',
            'earn_description' => 'Mô tả',
            'earn_img' => 'Hình ảnh'
        ];
    }
}
