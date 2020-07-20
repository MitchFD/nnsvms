<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_employee_info_tbl')->insert([
            [
                'employee_id'              => '20150348',
                'employee_job_description' => 'Student Discipline Director',
                'employee_department'      => 'DEPARTMENT OF STUDENT AFFAIRS AND SERVICES',
                'employee_phone_num'       => '09266993636',
                'created_at'               => now(),
                'updated_at'               => now(),
                'recovered_at'             => now()
            ]
        ]);
    }
}
