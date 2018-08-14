<?php

use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounts = ["SKB", "Delavska hranilnica", "Gotovina"];
        foreach ($accounts as $account) {
            $acc = new \App\Account;
            $acc->title = $account;
            $acc->balance = 1100.01;
            $acc->thumb = "not ready";
            $acc->save();
        }
    }
}
