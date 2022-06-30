<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //php artisan db:seed --class=AdminSeeder
        DB::table('admins')->insert([
            'name' => "Wiwit AB",
            'email' => "tester@gmail.com",
            'password' =>"tester@gmail.com",
            'remember_token' => "null",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}