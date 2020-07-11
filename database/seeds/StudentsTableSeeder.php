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
                'student_section'   => '4A',
                'student_year_level'=> 'FOURTH',
                'student_school'    => 'SBCS',
                'student_age'       => '22',
                'student_sex'       => 'Male',
                'student_email'     => 'mfodesierto@sdca.edu.ph',
                'student_phone_num' => '09266993636'
            ],
            [
                'student_id'        => '20179706',
                'student_last_name' => 'Zenarosa',
                'student_first_name'=> 'John Adrian G.',
                'student_image'     => 'zenarosa.jpg',
                'student_course'    => 'BSN',
                'student_section'   => '1C',
                'student_year_level'=> 'FIRST',
                'student_school'    => 'SHSP',
                'student_age'       => '20',
                'student_sex'       => 'Male',
                'student_email'     => 'mfodesierto@sdca.edu.ph',
                'student_phone_num' => '09266993636'
            ],
            [
                'student_id'        => '20150475',
                'student_last_name' => 'Garcia',
                'student_first_name'=> 'Christian Aldrin M.',
                'student_image'     => 'garcia.jpg',
                'student_course'    => 'BSA',
                'student_section'   => '3C',
                'student_year_level'=> 'THIRD',
                'student_school'    => 'SBCS',
                'student_age'       => '24',
                'student_sex'       => 'Male',
                'student_email'     => 'mfodesierto@sdca.edu.ph',
                'student_phone_num' => '09266993636'
            ],
            [
                'student_id'        => '20170088',
                'student_last_name' => 'Urbiztondo',
                'student_first_name'=> 'Mark Joseph G.',
                'student_image'     => 'urbiztondo.jpg',
                'student_course'    => 'BSBA',
                'student_section'   => '1B',
                'student_year_level'=> 'FIRST',
                'student_school'    => 'SBCS',
                'student_age'       => '25',
                'student_sex'       => 'Male',
                'student_email'     => 'mjurbiztondo@sdca.edu.ph',
                'student_phone_num' => '09959872147'
            ],
            [
                'student_id'        => '20173684',
                'student_last_name' => 'Dualan',
                'student_first_name'=> 'Aeron Ver G.',
                'student_image'     => 'dualan.jpg',
                'student_course'    => 'BSN',
                'student_section'   => '4A',
                'student_year_level'=> 'FOURTH',
                'student_school'    => 'SHSP',
                'student_age'       => '20',
                'student_sex'       => 'Male',
                'student_email'     => 'avgdualan@sdca.edu.ph',
                'student_phone_num' => '09773944166'
            ]
        ]);
    }
}
