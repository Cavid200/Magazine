<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstname'=>'required|min:3|max:15',
            'lastname'=>'required|min:3|max:15',
            'email'=>'required|email',
            'password'=>'required|min:6|max:20',
            'password_confirmation'=>'required|same:password',
        ];
    }
}
