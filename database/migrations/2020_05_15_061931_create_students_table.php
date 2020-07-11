<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_tbl', function (Blueprint $table) {
            $table->bigInteger('student_id')->unsigned()->primary();
            $table->string('student_last_name');
            $table->string('student_first_name');
            $table->string('student_image');
            $table->string('student_course');
            $table->string('student_year_level');
            $table->string('student_section');
            $table->string('student_school');
            $table->tinyInteger('student_age');
            $table->string('student_sex');
            $table->string('student_email');
            $table->bigInteger('student_phone_num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_tbl');
    }
}
