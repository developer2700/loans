<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Loan;
use App\Util\Paginate\Paginate;
use App\Util\Filters\LoanFilter;
use App\Http\Requests\Api\CreateLoan;
use App\Http\Requests\Api\UpdateLoan;
use App\Util\Transformers\LoanTransformer;
use Illuminate\Http\Request;


class LoansController extends ApiController
{
    /**
     * LoansController constructor.
     *
     * @param LoanTransformer $transformer
     */
    public function __construct(LoanTransformer $transformer)
    {
        $this->transformer = $transformer;

    }

    /**
     * Get all the loans.
     *
     * @param LoanFilter $filter
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(LoanFilter $filter)
    {

        $loans = new Paginate(Loan::WhereHas('user')->filter($filter));

        return $this->respondWithPagination($loans);
    }


    /**
     * Create a new Loan and return the Loan if successful.
     *
     * @param CreateLoan $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateLoan $request)
    {
        $inputs = $request->all();
        $loan = Loan::create($inputs);

        return $this->respondWithTransformer($loan);
    }

    /**
     * Get the loan given by its id.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Loan $loan)
    {
        return $this->respondWithTransformer($loan);
    }

    /**
     * Update the $loan given by its id and return the $loan if successful.
     *
     * @param UpdateLoan $request
     * @param User $loan
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateLoan $request, Loan $loan)
    {
        $inputs = $request->all();

        $loan->update($inputs);

        return $this->respondWithTransformer($loan);
    }

    /**
     * Delete the loan given by its id.
     *
     * @param DeleteLoan $request
     * @param Loan $loan
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();

        return $this->respondSuccess();
    }


}
