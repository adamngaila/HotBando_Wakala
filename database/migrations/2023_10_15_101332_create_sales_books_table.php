<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_books', function (Blueprint $table) {
            $table->id();
            $table->string('Wakala_code')->nullable();
            $table->string('Sales_id')->unique();
            $table->string('Customer_id')->nullable();
            $table->string('Customer_phone')->nullable();
            $table->string('Package_type')->nullable();
            $table->string('Amount')->nullable();
            $table->string('Payment_Type')->default('cash');
            $table->string('Authorization_Status')->default('Pending');
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
        Schema::dropIfExists('sales_books');
    }
}
