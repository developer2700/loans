<?php

use Illuminate\Database\Seeder;
use App\Models\Loan;

class LoansDataSeeder extends Seeder
{
    /**
     * Populate the database with data for users.json file.
     */
    public function run()
    {
        DB::table('loans')->delete();
        $json = File::get("loans.json");
        $loans = json_decode($json);
        foreach ($loans as $loan) {
            Loan::updateOrCreate(
                [
                    'user_id' => $loan->userId,
                    'dateApplied' => date("Y-m-d H:i:s",$loan->dateApplied),
                    'amount' => $loan->amount
                ],
                [
                    'interest' => $loan->interest,
                    'duration' => $loan->duration,
                    'dateLoanEnds' =>date("Y-m-d H:i:s",$loan->dateLoanEnds),
                    'campaign' => $loan->campaign,
                    'status' => $loan->status,
                ]);
        }

    }


}
