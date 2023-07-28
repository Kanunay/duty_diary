<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Generate random data for the users table
        $users = [
            [
                'email' => 'admin@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('gwapo_ako'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more user data here if needed
        ];

        // Insert the data into the "users" table
        DB::table('users')->insert($users);
    }
}
