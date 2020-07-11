<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_details_tbl', function (Blueprint $table) {
            $table->id('sanction_id');
            $table->unsignedBigInteger('sanction_key');
                $table->foreign('sanction_key')->references('sanction_key')->on('sanction_keys_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->string('sanction_details');
            $table->string('sanction_status')->default('Not Cleared');
            $table->timestamp('created_at')->format('Y-d-m h:i:s A l');
            $table->timestamp('updated_at')->format('Y-d-m h:i:s A l');
            $table->timestamp('completed_at')->format('Y-d-m h:i:s A l')->nullable();
            $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanction_details_tbl');
    }
}
