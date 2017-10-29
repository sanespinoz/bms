<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LamparaCreateRequest extends Request
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
           'marca'=>'required|min:2',
           'tipo'=>'max:20',
           'fecha_instalacion'=>'date',
           'vida'=>'size:3'

        ];
    }
}
