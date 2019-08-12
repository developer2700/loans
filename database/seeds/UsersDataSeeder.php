<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersDataSeeder extends Seeder
{
    /**
     * Populate the database with data for users.json file.
     */
    public function run()
    {
        DB::table('users')->delete();
        $json = File::get("users.json");
        $users = json_decode($json);
        foreach ($users as $user) {
            User::updateOrCreate(
                [
                    'email' => $user->email,
                    'personalCode' => $user->personalCode
                ],
                [
                    'id' => $user->userId,
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                    'phone' => $user->phone,
                    'active' => $user->active,
                    'isDead' => $user->isDead,
                    'lang' => $user->lang,
                ]);
        }

    }


}
