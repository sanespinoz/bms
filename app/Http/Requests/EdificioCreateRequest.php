<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EdificioCreateRequest extends Request
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
     * telefono Verifica que el número tenga 2, 3 o 4 caracteres numéricos para el código de área y, respectivamente, 4, 3 o 2 caracteres para la primera parte del resto del número. opcional El 15, espacio, punto o guión son opcionales, los paréntesis para el código de área no. (0342) 155989756
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
