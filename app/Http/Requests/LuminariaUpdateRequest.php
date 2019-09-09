<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LuminariaUpdateRequest extends Request
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
            'codigo'            => 'required|numeric',
            'nombre'            => 'required',
            'tipo'              => 'required',
            'descripcion'       => 'required',
            'dimensiones'       => 'required',
            'voltaje_nominal'   => 'numeric',
            'potencia_nominal'  => 'numeric',
            'corriente_nominal' => 'numeric',
            'fecha_alta'        => 'required|date',
            'fecha_baja'        => 'date|after:fecha_alta',
            'vida_util'         => 'numeric',
            'temperatura'       => 'numeric',
            'grupo_id'          => 'required|numeric',
        ];
    }
}
  