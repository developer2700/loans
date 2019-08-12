<?php

namespace App\Http\Requests\Api;

class UpdateLoan extends ApiRequest
{
    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
//    protected function validationData()
//    {
//        return $this->get('loan') ?: [];
//    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required',
            'interest' => 'required',
            'duration' => 'required',
            'dateApplied' => 'required',
            'dateLoanEnds' => 'required',
            'campaign' => 'required',
        ];
    }

}
