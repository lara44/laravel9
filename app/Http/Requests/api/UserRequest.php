<?php

namespace App\Http\Requests\api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'action' => 'required',
            'id' => 'required_if:action,===,update',
            'name' => 'required|max:100',
            'email' =>  'required|max:100|unique:users,email,'.$this->id ,
            'password' => 'required|min:10|max:100',
        ];
    }
}
