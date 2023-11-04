<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWakalaRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wakala_registers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('User_id')->unique();
            $table->string('Wakala_code')->unique();
            $table->string('Wakala_commission')->nullable();
            $table->string('Contract')->nullable();
            $table->string('Status')->nullable();
            $table->string('Jumla_mauzo')->nullable();
            $table->string('wakala_mapato')->nullable();
            $table->string('Target_Sales')->nullable(); 
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
        Schema::dropIfExists('wakala_registers');
    }
}
