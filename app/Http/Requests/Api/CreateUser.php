<?php

namespace App\Http\Requests\Api;

class CreateUser extends ApiRequest
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        return $this->get('user') ?: [];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'personalCode' => 'required',
            'email' => 'email|max:255|unique:users',
        ];
    }
}
