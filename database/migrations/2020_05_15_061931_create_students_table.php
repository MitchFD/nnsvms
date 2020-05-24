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
        Schema::create('students', function (Blueprint $table) {
            $table->bigInteger('student_id')->unsigned()->primary();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('age');
            $table->string('gender');
            $table->string('email');
            $table->string('phone_number');
            $table->string('school');
            $table->string('course');
            $table->string('year_level');
            $table->string('section');
            $table->string('academic_year');
            $table->string('semester');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
