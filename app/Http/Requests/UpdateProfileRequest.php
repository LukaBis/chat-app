<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'image|mimes:jpeg,png,jpg|nullable',
            'country' => 'max:80|nullable',
            'phone' => 'max:80|nullable',
            'email' => 'email|nullable',
            'about' => 'max:1000|nullable'
        ];
    }
}
