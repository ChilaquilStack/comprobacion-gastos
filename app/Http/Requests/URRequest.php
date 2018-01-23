<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class URRequest extends FormRequest {
    
    public function authorize() {
        return true;
    }

    public function rules() {
        return [
            'id' => 'required|unique:ur,id'
        ];
    }

    public function messages () {
        return [
            'id.required' => 'Ingrese la clave',
            'id.unique' => 'La clave ya existe'
        ];
    }
}
