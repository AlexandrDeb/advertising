<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(['username'=>'Ben','password' => bcrypt('secret')]);
        User::create(['username'=>'Jane','password' => bcrypt('secret')]);
    }
}
