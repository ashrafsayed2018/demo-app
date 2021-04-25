<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'about'         => 'required|max:255',
            'mobile_number' => 'required|digits:8',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'location'      => 'required|max:255'
        ];
    }

    public function messages()
{
    return [
        'about.required' => 'نبذه عن الشركه',
        'mobile_number.required' => 'رقم التليفون مطلوب',
    ];
}
}
