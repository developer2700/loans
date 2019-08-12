<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Util\Paginate\Paginate;
use App\Util\Filters\UserFilter;
use App\Http\Requests\Api\CreateUser;
use App\Http\Requests\Api\UpdateUser;
use App\Util\Transformers\UserTransformer;
use Illuminate\Http\Request;


class UsersController extends ApiController
{
    /**
     * UserController constructor.
     *
     * @param UserTransformer $transformer
     */
    public function __construct(UserTransformer $transformer)
    {
        $this->transformer = $transformer;

    }

    /**
     * Get all the users.
     *
     * @param UserFilter $filter
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(UserFilter $filter)
    {

        $users = new Paginate(User::filter($filter));

        return $this->respondWithPagination($users);
    }


    /**
     * Create a new User and return the User if successful.
     *
     * @param CreateUser $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateUser $request)
    {
        $inputs = $request->all();
        $user = User::create($inputs);

        return $this->respondWithTransformer($user);
    }

    /**
     * Get the user given by its id.
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        return $this->respondWithTransformer($user);
    }

    /**
     * Update the $user given by its id and return the $user if successful.
     *
     * @param UpdateUser $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateUser $request, User $user)
    {
        $inputs = $request->all();

        $user->update($inputs);

        return $this->respondWithTransformer($user);
    }

    /**
     * Delete the user given by its id.
     *
     * @param DeleteUser $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->respondSuccess();
    }


}
