<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRegistartion extends FormRequest
{
    /**
     * Determine if thdocker stop $(docker ps -a -q)e user is authorized to make this request.
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
            'login' => 'unique:users',
            'email' => 'unique:users',
        ];
    }
}
