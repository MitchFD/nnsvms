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
                'user_role_access'  => '["Profile", "Announcement", "Dashboard", "Violation Entry", "Violation Records", "Users Management", "Student Handbook"]',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'user_role'         => 'Security Guard',
                'user_role_access'  => '["Profile", "Violation Entry", "Student Handbook"]',
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        ]);
    }
}
