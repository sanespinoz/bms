<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DispositivoUpdateRequest extends Request
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
            'codigo'     => 'required',
            'marca'      => 'required|max:15',
            'tipo'       => 'required|max:15',
            'nombre'     => 'required|min:4|max:15',
            'estado'     => 'required',
            'fecha_alta' => 'required|date',
            'fecha_baja' => 'required_if:estado,i|date|after:fecha_alta',
            'estado'     => 'required|string|size:1',

        ];
    }
    public function messages()
    {
    return [
        'fecha_baja.required_if' => 'El campo :attribute es obligatorio cuando el campo estado es inactivo.',
    ];
}
}
