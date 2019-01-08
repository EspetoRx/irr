<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$user = new User;
        $user->name = "Blog Administrator";
        $user->email = "admin@blogirr.com";
        $user->password = Hash::make("blogirr");
        $user->save();*/
        $user = new User;
        $user->name = "Lucas";
        $user->email = "lcdo2395@gmail.com";
        $user->password = Hash::make("lucasirr");
        $user->save();
    }
}
