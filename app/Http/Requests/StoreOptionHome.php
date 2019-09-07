<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOptionHome extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gallery' => 'required',
            'product_id' => 'required',
            'about_title1' => 'required',
            'about_title2' => 'required',
            'gallery_about' => 'required',
            'video' => 'required',
            'video_title1' => 'required',
            'video_title2' => 'required',
            'video_gallery' => 'required',
            'product_id_look' => 'required',
            'gallery_look' => 'required',

            'collecttion' => 'required',
            'gallery_col' => 'required',
            'collection_title' => 'required',
            'look_title1' => 'required',
            'look_title2' => 'required',

            'view_best_seller' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'gallery.required' => 'Banner không được để trống',
            'about_title1.required' => 'Tiêu đề  giới thiệu 1 không được để trống',
            'about_title2.required' => 'Tiêu đề  giới thiệu 2 không được để trống2',
            'gallery_about.required' => 'Ảnh giới thiệu không được để trống',
            'video.required' => 'Link Video không được để trống',
            'video_title1.required' => 'Tiêu đề video không được để trống',
            'video_title2.required' => 'Tiêu đề video không được để trống',
            'video_gallery.required' => 'Ảnh nền video không được để trống',
            'gallery_look.required' => 'Ảnh sản phẩm không được để trống',
            'gallery_col.required' => 'Ảnh nền bộ sưu tập không được để trống',
            'collection_title.required' => 'Tiêu đề bộ sưu tập không được để trống',
            'look_title1.required' => 'Tiêu đề 1 sản phẩm',
            'look_title2.required' => 'Tiêu đề 2 sản phẩm không được để trống',
            'view_best_seller.required' => "Link xem tất cả sản phẩm bán chạy không được để trống"
        ];
    }
}
