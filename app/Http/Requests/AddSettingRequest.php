<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSettingRequest extends FormRequest
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
            'website_name' => 'required',
            'website_url' => 'required',
            'page_title' => 'required',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'phone1' => 'required',
            'phone2' => 'required',
            'email1' => 'required',
            'email2' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',


        ];
    }
}
