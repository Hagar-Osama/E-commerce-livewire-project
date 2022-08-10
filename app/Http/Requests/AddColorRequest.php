<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddColorRequest extends FormRequest
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
            'name' => 'required|unique:colors,name',
            'code' => 'required|starts_with:#',
            'status' => 'in:visible,hidden'
        ];
    }
}
