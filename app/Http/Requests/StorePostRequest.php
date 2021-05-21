<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'sname' => 'alpha',
            'semail' => 'email',
            'sphone' => 'numeric|digits:10',
        ];
    }

    public function messages()
    {
        return [
            'sname.alpha' => 'Name should contain only Letters',
            'sphone.numeric' => 'Phone Number should contain only Numbers',
            'sphone.digits' => 'Phone Number should have 10 Digits',
        ];
    }
}
