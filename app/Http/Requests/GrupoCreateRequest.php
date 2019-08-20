<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GrupoCreateRequest extends Request
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
            'nombre'            => 'required|min:5|unique:grupos',
            'descripcion'       => 'required|min:10|max:200',
            'cant_luminarias'   => 'required|numeric|min:1|max:15',
            'piso_id'           => 'required|numeric',
            'sector_id'         => 'required|numeric',

        ];
    }
   
}
