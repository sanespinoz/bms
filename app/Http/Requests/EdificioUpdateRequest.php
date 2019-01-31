<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EdificioUpdateRequest extends Request
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
            'nombre'      => 'required|min:6',
            'telefono'    => 'required',
            'direccion'   => 'required|max:30',
            'email'       => 'required|email',
            'provincia'   => 'required|string|max:25',
            'ciudad'      => 'required|string|max:25',
            'codigo'      => 'required|numeric|digits:4',
            'descripcion' => 'required',
        ];
    }
}
