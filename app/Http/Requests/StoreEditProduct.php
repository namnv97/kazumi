<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Model\User;


class StoreEditProduct extends FormRequest
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
            'slug' => 'required|unique:products,slug,'.$this->id,
            'description' => 'required',
            'pack_single' => 'required',
            'price_single' => 'required',
            'color_single' => 'required',
            'collection_id' => 'required',
            'gallery' => 'required'
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
            'name' => 'Tên sản phẩm',
            'slug' => 'Đường dẫn sản phẩm',
            'description' => 'Mô tả sản phẩm',
            'pack_single' => 'Số lượng sản phẩm',
            'price_single' => 'Giá',
            'color'  => 'Màu',
            'collection_id' => 'Danh mục',
            'gallery' => 'Thư viện'
        ];
    }
}
