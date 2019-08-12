<?php

namespace App\Util\Transformers;

class LoanTransformer extends Transformer
{
    protected $resourceName = 'loan';


    /**
     * Transform a collection of User items we can add extra data like custom attribute definded in Loan model.
     *
     * @param Collection $loan
     * @return array
     */
    public function transform($loan)
    {
        $loan['userfullName']=$loan->user->firstName . ' ' . $loan->user->lastName;
        return $loan;

    }
}
