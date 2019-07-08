<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'apellido' => 'required|max:15|min:3',
            'nombre'   => 'required|max:15|min:3',
            'name'     => 'required|max:15|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }
}
