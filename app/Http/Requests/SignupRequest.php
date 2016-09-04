<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SignupRequest extends Request
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
            'email' => 'required|email|unique:users',
            'name' => 'required|max:100',
            'password' => 'required|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Dinh dang email sai',
            'email.unique' => 'Email da duoc su dung',
            'email.required' => 'Ban chua nhap email',
            'name.required' => 'Ban chua nhap ten',
            'password.required' => 'Ban chua nhap mat khau',
            'password.min' => 'Mat khau toi thieu phai co 6 ky tu',
        ];
        
    }
}
