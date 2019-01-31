<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DispositivoCreateRequest extends Request
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
            'estado'     => 'required|string|size:1',
            'fecha_alta' => 'required|date',
            'sector_id'  => 'required',

        ];
    }
}
