<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterValidator extends FormRequest
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
            'name' => 'required|alpha',
            'email' => 'required',
            'password' => 'required|confirmed'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Please enter your name',
            'name.alpha' => 'Name should contain only characters',
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password'
        ];
    }
}
