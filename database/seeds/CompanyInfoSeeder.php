<?php

use Illuminate\Database\Seeder;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users= \App\Models\User::all();
        foreach ($users as $user){
            $userInfo = factory(\App\Models\CompanyInfo::class)->create(['user_id'=>$user->id]);
        }
    }
}
