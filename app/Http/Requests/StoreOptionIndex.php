<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
use App\Model\User;

class StoreOptionIndex extends FormRequest
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
            'logo' => 'required',
            'banner_collection' => 'required',
            'suggest_collection' => 'required',
            'reward_help' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => 'Logo không được để trống',
            'banner_collection.required' => 'Banner bộ sưu tập không được để trống',
            'suggest_collection.required' => 'Nội dung bộ sưu tập không được để trống',
            'reward_help.required' => 'Nội dung hỗ trợ trang điểm thưởng không được để trống'
        ];
    }
}
