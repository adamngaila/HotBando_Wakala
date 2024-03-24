<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVochaColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vifurushi_transactions', function (Blueprint $table) {
            //
            $table->string('Vocha_Value')->nullable();
            $table->string('Vocha_Qty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vifurushi_transactions', function (Blueprint $table) {
            //
        });
    }
}
