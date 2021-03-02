<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRegistartion extends FormRequest
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
            'login' => 'unique:users',
            'email' => 'unique:users',
        ];
    }

    /**
     * Get the validated data from the request.
     *
     * @return array
     */
    public function failed()
    {
        return $this->validator->failed();
    }


    protected function failedValidation(Validator $validator)
    {
        return true;
    }

}
