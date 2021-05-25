<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UserRegistartion extends FormRequest
{
    private $failValidationFields;


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

    /**
     * Get not validated data from the request.
     *
     * @return array
     */
    public function failedFields()
    {
        $this->failValidationFields = $this->validator->failed();
        return $this->failValidationFields;
    }

    /**
     * @return bool
     */
    public function getValidationStatus(){
        if(empty($failValidationFields)){
            return true;
        }
        return false;
    }

}
