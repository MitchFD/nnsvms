<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations_tbl', function (Blueprint $table) {
            $table->id('violation_id');
            $table->timestamp('created_at')->format('Y-d-m h:i:s A l');
            $table->timestamp('updated_at')->format('Y-d-m h:i:s A l');
            $table->unsignedTinyInteger('offense_count');
            $table->json('minor_offenses')->nullable();
            $table->json('less_serious_offenses')->nullable();
            $table->json('other_offenses')->nullable();
            $table->unsignedBigInteger('student_id');
                $table->foreign('student_id')->references('student_id')->on('students_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->timestamp('recovered_at')->format('Y-d-m h:i:s A l');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('violations_tbl');
    }
}
