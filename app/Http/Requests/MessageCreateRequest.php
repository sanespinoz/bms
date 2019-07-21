<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MessageCreateRequest extends Request
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
            'name'   => 'required',
            'email'    => 'required|email',
            'subject'   => 'required',
            'mensaje' => 'required|min:3',
        ];
    }
     public function messages()
    {
    return [
        'name.required' => 'Necesitamos tu nombre',
        'email.required' => 'Necesitamos tu email',
        'subject.required' => 'Necesitamos el asunto',
        'mensaje.required' => 'Necesitamos el mensaje a enviar',
    ];
    }
}
