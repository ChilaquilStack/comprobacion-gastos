<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
    
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'email' => 'email|required',
            'password' => 'required'
        ];
    }

    public function messages () {
        return [
            'email.email' => 'esta no es una direccion de correo valido',
            'email.requiered' => 'ingrese un correo',
            'password.required' => 'ingrese una contraseña'
        ];
    }

}
