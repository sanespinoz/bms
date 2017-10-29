<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GrupoUpdateRequest extends Request
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
            'nombre'=>'required|min:2',
            'cant_luminarias'=>'numeric|min:1|max:15',
            'energia_consumida'=>'numeric|min:1',
            'sector_id'=>'required'
        ];
    }
}
