<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles_tbl')->insert([
            [
                'user_role'         => 'Administrator',
                'user_role_access'  => '["profile", "announcement", "dashboard", "violation entry", "violation records", "users management", "student handbook"]',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'user_role'         => 'Security Guard',
                'user_role_access'  => '["profile", "violation entry", "student handbook"]',
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        ]);
    }
}
