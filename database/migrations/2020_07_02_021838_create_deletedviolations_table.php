<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeletedviolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deleted_violations_tbl', function (Blueprint $table) {
            $table->id('deletion_id');
            $table->unsignedBigInteger('from_violation_id');
                $table->foreign('from_violation_id')->references('violation_id')->on('violations_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->json('deleted_offenses');
            $table->string('reason_deletion');
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->timestamp('created_at')->format('Y-d-m h:i:s A l');
            $table->timestamp('updated_at')->format('Y-d-m h:i:s A l');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deleted_violations_tbl');
    }
}
