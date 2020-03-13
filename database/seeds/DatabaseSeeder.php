<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
        'name'=>'John Doe',
        'email'=>'admin@demo.com',
        'password'=>Hash::make('123456'),
        'role'=>'admin'
        ]);
    }
}
