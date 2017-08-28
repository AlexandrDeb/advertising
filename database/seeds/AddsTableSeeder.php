<?php

use Illuminate\Database\Seeder;
use App\Ad;
class AddsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ad::create(['title'=>str_random(10),'description' => str_random(40),'author_name'=>'Ben']);
        Ad::create(['title'=>str_random(10),'description' => str_random(40),'author_name'=>'Jane']);
        Ad::create(['title'=>str_random(10),'description' => str_random(40),'author_name'=>'Ben']);
        Ad::create(['title'=>str_random(10),'description' => str_random(40),'author_name'=>'Jane']);
        Ad::create(['title'=>str_random(10),'description' => str_random(40),'author_name'=>'Ben']);
        Ad::create(['title'=>str_random(10),'description' => str_random(40),'author_name'=>'Jane']);
        Ad::create(['title'=>str_random(10),'description' => str_random(40),'author_name'=>'Ben']);
    }
}
