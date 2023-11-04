<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('Wakala_code')->nullable();
            $table->string('Customer_id')->unique();;
            $table->string('Name');
            $table->string('Picture')->nullable();
            $table->string('Status')->default('Active');
            $table->string('Adress')->nullable();
            $table->string('Phone')->nullable();
            $table->string('Credit_id')->unique();
            $table->string('Credit_type')->nullable();
            $table->string('Credit_limit')->nullable();
            $table->string('Credit_amount')->nullable();
            $table->string('Credit_balance')->nullable();
            $table->string('Credit_status')->nullable();
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
        Schema::dropIfExists('customer_accounts');
    }
}
