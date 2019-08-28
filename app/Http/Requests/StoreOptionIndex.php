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
            'logo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => 'Logo không được để trống'
        ];
    }
}
