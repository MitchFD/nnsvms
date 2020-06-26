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
        DB::table('users_tbl')->insert([
            [
                'username'          => 'admini1',
                'user_last_name'    => 'Wick',
                'user_first_name'   => 'John',
                'user_employee_id'  => '12345678910',
                'user_description'  => 'Student Discipline Director',
                'user_role'         => 'Administrator',
                'user_image'        => 'user_default_image.jpg',
                'email'             => 'mfodesierto@sdca.edu.ph',
                'email_verified_at' => now(),
                'password'          => Hash::make('admin123'),
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        ]);
    }
}
