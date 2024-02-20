<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVifurushiTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vifurushi_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('Transaction_id')->unique();
            $table->string('Wakala_code')->nullable();
            $table->string('Transaction_type')->nullable();
            $table->string('Value')->nullable();
            $table->string('Amount')->nullable();
            $table->string('Transaction_request_id')->nullable();
            $table->string('Transaction_reference')->nullable();
            $table->string('Transaction_status')->nullable();
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
        Schema::dropIfExists('vifurushi_transactions');
    }
}
