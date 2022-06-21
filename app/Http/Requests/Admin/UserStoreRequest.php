<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'firstname'=>'required|min:3|max:20',
            'lastname'=>'required|min:3|max:20',
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'about'=>'nullable',
            'email'=>'required|email|max:50',
            'password'=>'required|min:3|max:20',
            'confirm_password'=>'required|same:password',
            'role_id'=>'required|exists:roles,id',
            'isActive'=>'nullable',

        ];
    }
}
