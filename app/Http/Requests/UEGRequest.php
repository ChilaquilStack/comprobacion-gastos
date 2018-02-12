<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UEGRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules () {
        return [
            'clave' => 'required|unique:ueg,id'
        ];
    }

    public function messages () {
        return [
            'clave.required' => 'La clave es requerida',
            'clave.unique' => 'La clave ya existe'
        ];
    }
}
