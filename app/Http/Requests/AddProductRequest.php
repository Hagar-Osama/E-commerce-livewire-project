<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'in:visible,hidden',
            'meta_title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'brief' => 'required',
            'price' => 'required',
            'selling_price' => 'required',
            'trendy' => 'in:yes,no',
            'qty' => 'required',
            'brand_id' => 'exists:brands,id',
            'image.*' => 'required|mimes:png,jpg,svg,gif,webp',
            'product_id' => 'exists:products,id',
            'color_id' => 'exists:colors,id',
            'color_qty' => 'required',


        ];
    }
}
