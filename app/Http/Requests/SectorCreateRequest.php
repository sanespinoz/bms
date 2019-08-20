<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SectorCreateRequest extends Request
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
            'nombre'            => 'required|min:2|unique:sectores',
            'descripcion'       => 'required|min:10|max:200',
            'piso_id'           => 'required|numeric',
        ];
    }
        /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
    return [
        'piso_id.required' => 'El piso debe seleccionarse del desplegable.',
    ];
    }
}
