<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('Transaction_id')->unique();
            $table->string('Wakala_code')->nullable();
            $table->string('Customer_id')->nullable();
            $table->string('Sales_id')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('Credit')->nullable();
            $table->string('Cash')->nullable();
            $table->string('Amount')->nullable();
            $table->string('Commission')->nullable();
            $table->string('transaction_status')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
