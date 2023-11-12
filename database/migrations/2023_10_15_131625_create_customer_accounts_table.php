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
            $table->string('Customer_id')->unique();
            $table->string('Name')->nullable();
            $table->string('Status_Online')->nullable();
            $table->string('Status_Disabled')->nullable();
            $table->string('Phone')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('last-seen')->nullable();
            $table->string('shared-users')->nullable();
            $table->string('download-used')->nullable();
            $table->string('upload-used')->nullable();
            $table->string('uptime-used')->nullable();
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
