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
                'id'                => '20150348',
                'user_role'         => 'Administrator',
                'user_image'               => 'user_default_image.jpg',
                'user_last_name'           => 'Desierto',
                'user_first_name'          => 'Mitch Frankein',
                'username'          => 'Administrator',
                'password'          => Hash::make('admin123'),
                'email'             => 'mfodesierto@sdca.edu.ph',
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
                'recovered_at'        => now()
            ]
        ]);
    }
}
