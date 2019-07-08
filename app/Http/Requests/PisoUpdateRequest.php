<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PisoUpdateRequest extends Request
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
            'nombre'           => 'required|min:3',
            'descripcion'       => 'required|min:10|max:200',
            'edificio_id'       => 'required|numeric|',
        ];
    }
}