<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionselviolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_sel_violations', function (Blueprint $table) {
            $table->unsignedBigInteger('sanction_key');
                $table->foreign('sanction_key')->references('sanction_key')->on('sanction_keys_tbl')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->unsignedBigInteger('selected_violation_id');
                $table->foreign('selected_violation_id')->references('sanction_key')->on('sanction_keys_tbl')
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
        Schema::dropIfExists('sanction_sel_violations');
    }
}
