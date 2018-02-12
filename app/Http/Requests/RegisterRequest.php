<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
    
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed|alpha_dash'
        ];
    }

    public function messages () {
        return [
            'nombre.required' => 'Se requiere un nombre',
            'apellido_paterno.required' => 'Se require un apellid paterno',
            'apellido_materno.required' => 'Se require un apellido materno',
            'email.required' => 'Se requiere un correo electronico',
            'email.email' => 'Correo electronico no valido',
            'email.unique' => 'El correo electronico ya existe',
            'password.required' => 'Se requiere una contraseña',
            'password.min' => 'La contraseña debe ser de 6 caracteres como minimo',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.alpha_dash' => 'La contraseña debe ser alfanumerica'
        ];
    }
}