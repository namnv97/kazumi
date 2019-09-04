<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use App\Model\User;

class StoreAddProduct extends FormRequest
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
            'slug' => 'required|unique:products,slug',
            'description' => 'required',
            'product_content' => 'required',
            'pack_single' => 'required',
            'price_single' => 'required',
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
            'product_content' => 'Nội dung chi tiết',
            'pack_single' => 'Số lượng sản phẩm',
            'price_single' => 'Giá',
            'collection_id' => 'Danh mục',
            'gallery' => 'Thư viện ảnh'
        ];
    }
}
