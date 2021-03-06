<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        DB::table('users')->insert([
            'name' => 'admin-user',
            'email' => 'bookstor_laravel795@test.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'admin_level' => 2,
            'remember_token' => Str::random(10),
        ]);
    }
}
