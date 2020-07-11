<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanctionkeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanction_keys_tbl', function (Blueprint $table) {
            $table->id('sanction_key');
            $table->json('selected_violation_ids');
            $table->string('sanction_status');
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
        Schema::dropIfExists('sanction_keys_tbl');
    }
}
