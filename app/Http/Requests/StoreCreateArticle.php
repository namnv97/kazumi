<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Auth;
use App\Model\User;

class StoreCreateArticle extends FormRequest
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
            'title' => 'required',
            'slug' => 'required|unique:articles,slug',
            'article_content' => 'required',
            'thumbnail' => 'required'
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
            'title' => 'Tiêu đề bài viết',
            'slug' => 'Đường dẫn bài viết',
            'article_content' => 'Nội dung bài viết',
            'thumbnail' => 'Ảnh bài viết'
        ];
    }


}
