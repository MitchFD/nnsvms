<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseractivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_activities_tbl', function (Blueprint $table) {
            $table->id('activity_id');
            $table->timestamp('created_at')->format('Y-d-m h:i:s A l');
            $table->timestamp('updated_at')->format('Y-d-m h:i:s A l');
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->string('activity_type');
            $table->string('activity_details');
            $table->unsignedBigInteger('affected_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_activities_tbl');
    }
}
