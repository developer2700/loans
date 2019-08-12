<?php

namespace App\Util\Transformers;

class UserTransformer extends Transformer
{
    protected $resourceName = 'user';


    /**
     * Transform a collection of User items we can add extra data like custom attribute definded in User model.
     *
     * @param Collection $loan
     * @return array
     */
    public function transform($user)
    {
        $user['fullName']=$user->firstName .' '. $user->lastName;
        $user['birthDate']=$user->birthDateFormatted;
        $user['age']=$user->age;
        return $user;

    }
}
