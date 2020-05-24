<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'last_name' => 'Wick',
                'first_name' => 'John',
                'employee_id' => '12345678910',
                'user_description' => 'Student Discipline Director',
                'user_role' => 'Administrator',
                'user_image' => 'user.jpg',
                'email' => 'admin@svms.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'last_name' => 'Scofield',
                'first_name' => 'Micheal',
                'employee_id' => '12543123',
                'user_description' => 'Head Security',
                'user_role' => 'Guard',
                'user_image' => 'user.jpg',
                'email' => 'guard1@svms.com',
                'email_verified_at' => now(),
                'password' => Hash::make('guard100'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'last_name' => 'Bagwell',
                'first_name' => 'Theodore',
                'employee_id' => '12543123',
                'user_description' => 'Security Guard',
                'user_role' => 'Guard',
                'user_image' => 'user.jpg',
                'email' => 'guard2@svms.com',
                'email_verified_at' => now(),
                'password' => Hash::make('guard200'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'last_name' => 'Sucre',
                'first_name' => 'Fernando',
                'employee_id' => '12543123',
                'user_description' => 'Security Guard',
                'user_role' => 'Guard',
                'user_image' => 'user.jpg',
                'email' => 'guard3@svms.com',
                'email_verified_at' => now(),
                'password' => Hash::make('guard300'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
