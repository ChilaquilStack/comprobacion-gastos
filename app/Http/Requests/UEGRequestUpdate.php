<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UEGRequestUpdate extends FormRequest
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
     public function rules () {
        return [
            'clave' => 'required|unique:ueg,id,'.$this->ueg->clave.',clave',
            'descripcion' => 'required',
            'ur_id' => 'required'
        ];
    }

    public function messages () {
        return [
            'clave.required' => 'La clave es requerida',
            'clave.unique' => 'La clave ya existe',
            'descripcion.required' => 'Ingrese una descripcion',
            'ur_id.required' => 'Ingrese una unidad responsable'
        ];
    }
}
