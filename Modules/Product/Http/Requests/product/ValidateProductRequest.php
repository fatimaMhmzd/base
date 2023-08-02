<?php

namespace Modules\Product\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
/*        # video
        $list_mimes_allowable_from_upload_video = config('configs.videos.mimes_allowable_from_upload');
        $mimes_allowable_from_upload_video = implode(',', $list_mimes_allowable_from_upload_video);*/

        return [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'file' => 'nullable|array',
            'brand' => 'required|string',
            'full_title' => 'required|string',
            'product_group_id' => 'required|integer',
            'price' => 'required|integer',
            'off_price' => 'nullable|integer',
            'off' => 'nullable|integer',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'available' => 'nullable|integer',
            'link' => 'nullable|string',
            'key_word' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'weight' => 'nullable|integer',
            'weight_with_packaging' => 'nullable|integer',
            'unit_weight' => 'nullable|integer',
            'status' => 'nullable|string',
            'barcode' => 'nullable|integer',
            'creator' => 'nullable|integer',
            'updater' => 'nullable|integer',
            'pricearray' => 'nullable|array',
            'numberarray' => 'nullable|array',
            'suggest' => 'nullable|array',
            'ids' => 'nullable|array',
            'video' => "nullable",
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => "عنوان",
            'sub_title' => "زیر عنوان",
            'brand' => "برند",
            'full_title' => "عنوان تکمیلی محصول",
            'product_group_id' => "گروهبندی",
            'price' => "قیمت",
        ];
    }
}
