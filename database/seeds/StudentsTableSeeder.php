<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'student_id'    => '20150348',
                'last_name'     => 'Desierto',
                'first_name'    => 'Mitch Frankein O.',
                'age'           => '22',
                'gender'        => 'M',
                'email'         => 'mfodesierto@sdca.edu.ph',
                'phone_number'  => '09266993636',
                'school'        => 'SBCS',
                'course'        => 'BSIT',
                'year_level'    => 'FOURTH',
                'section'       => '4A',
                'academic_year' => '2019-2020',
                'semester'      => 'SECOND',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'student_id'    => '20150123',
                'last_name'     => 'Doe',
                'first_name'    => 'John',
                'age'           => '21',
                'gender'        => 'M',
                'email'         => 'mfodesierto2@gmail.com',
                'phone_number'  => '09266993636',
                'school'        => 'SASE',
                'course'        => 'BED',
                'year_level'    => 'SECOND',
                'section'       => '2C',
                'academic_year' => '2019-2020',
                'semester'      => 'FIRST',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'student_id'    => '20150456',
                'last_name'     => 'Urbiztondo',
                'first_name'    => 'John Mark G.',
                'age'           => '24',
                'gender'        => 'M',
                'email'         => 'mjgurbiztondo@gmail.com',
                'phone_number'  => '09266993636',
                'school'        => 'SIHTM',
                'course'        => 'BSTM',
                'year_level'    => 'FIRST',
                'section'       => '1B',
                'academic_year' => '2019-2020',
                'semester'      => 'SECOND',
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'student_id'    => '20150789',
                'last_name'     => 'Dualan',
                'first_name'    => 'Aeron Ver G.',
                'age'           => '19',
                'gender'        => 'M',
                'email'         => 'avgdualan@sdca.edu.ph',
                'phone_number'  => '09266993636',
                'school'        => 'SIHTM',
                'course'        => 'BSN',
                'year_level'    => 'THIRD',
                'section'       => '1B',
                'academic_year' => '2019-2020',
                'semester'      => 'SECOND',
                'created_at'    => now(),
                'updated_at'    => now()
            ]
        ]);
    }
}
