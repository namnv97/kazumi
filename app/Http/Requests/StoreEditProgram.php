<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Model\User;

class StoreEditProgram extends FormRequest
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
            'slug' => 'required|unique:pages,slug,'.$this->id,
            'banner' =. 'required',
            'page_title' => 'required',
            'pro_title' => 'required'
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
            'page_title' => 'Tiêu đề banner',
            'pro_title' => 'Tiêu đề chương trình'
        ];
    }

}
