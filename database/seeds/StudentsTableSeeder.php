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
        DB::table('students_tbl')->insert([
            [
                'student_id'        => '20150348',
                'student_last_name' => 'Desierto',
                'student_first_name'=> 'Mitch Frankein O.',
                'student_image'     => 'desierto.jpg',
                'student_course'    => 'BSIT',
                'student_year_level'=> '4',
                'student_section'   => '4A',
                'student_school'    => 'SBCS',
                'student_a_y'       => '2019-2020',
                'student_semester'  => 'SECOND',
                'student_gender'    => 'Male',
                'student_age'       => '22',
                'student_email'     => 'mfodesierto@sdca.edu.ph',
                'student_phone_num' => '09266993636'
            ],
            [
                'student_id'        => '20179706',
                'student_last_name' => 'Zenarosa',
                'student_first_name'=> 'John Adrian G.',
                'student_image'     => 'zenarosa.jpg',
                'student_course'    => 'BSN',
                'student_year_level'=> '1',
                'student_section'   => '1A',
                'student_school'    => 'SHSP',
                'student_a_y'       => '2019-2020',
                'student_semester'  => 'SECOND',
                'student_gender'    => 'Male',
                'student_age'       => '20',
                'student_email'     => 'mfodesierto@sdca.edu.ph',
                'student_phone_num' => '09266993636'
            ],
            [
                'student_id'        => '20150475',
                'student_last_name' => 'Garcia',
                'student_first_name'=> 'Christian Aldrin M.',
                'student_image'     => 'garcia.jpg',
                'student_course'    => 'BSA',
                'student_year_level'=> '3',
                'student_section'   => '3A',
                'student_school'    => 'SBCS',
                'student_a_y'       => '2019-2020',
                'student_semester'  => 'SECOND',
                'student_gender'    => 'Male',
                'student_age'       => '24',
                'student_email'     => 'mfodesierto@sdca.edu.ph',
                'student_phone_num' => '09266993636'
            ],
            [
                'student_id'        => '20170088',
                'student_last_name' => 'Urbiztondo',
                'student_first_name'=> 'Mark Joseph G.',
                'student_image'     => 'urbiztondo.jpg',
                'student_course'    => 'BSBA',
                'student_year_level'=> '1',
                'student_section'   => '1B',
                'student_school'    => 'SBCS',
                'student_a_y'       => '2019-2020',
                'student_semester'  => 'SECOND',
                'student_gender'    => 'Male',
                'student_age'       => '25',
                'student_email'     => 'mjurbiztondo@sdca.edu.ph',
                'student_phone_num' => '09959872147'
            ],
            [
                'student_id'        => '20173684',
                'student_last_name' => 'Dualan',
                'student_first_name'=> 'Aeron Ver G.',
                'student_image'     => 'dualan.jpg',
                'student_course'    => 'BSN',
                'student_year_level'=> '4',
                'student_section'   => '4B',
                'student_school'    => 'SHSP',
                'student_a_y'       => '2019-2020',
                'student_semester'  => 'SECOND',
                'student_gender'    => 'Male',
                'student_age'       => '20',
                'student_email'     => 'avgdualan@sdca.edu.ph',
                'student_phone_num' => '09773944166'
            ]
        ]);
    }
}
