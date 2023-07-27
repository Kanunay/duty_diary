<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'supervisor'],
            ['name' => 'trainee'],
        ];

        // Insert the data into the "roles" table
        DB::table('roles')->insert($roles);
    }
}
