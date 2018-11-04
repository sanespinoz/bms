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
           'codigo'=>'numeric',
           'nombre'=>'required',
           'tipo'=>'required',
           'descripcion'=>'required',
           'dimensiones'=>'required',
           'voltaje_nominal'=>'required|numeric',
           'potencia_nominal'=>'required|numeric',
           'corriente_nominal'=>'required|numeric',
           'fecha_alta'=>'required',
           'vida_util'=>'required|numeric',
           'estado'=>'required|string|size:1',
           'grupo_id'=>'required|numeric',
        ];
    }
}
