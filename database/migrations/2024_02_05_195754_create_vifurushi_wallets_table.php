<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVifurushiWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vifurushi_wallets', function (Blueprint $table) {
            $table->id();
            $table->string('Wakala_code')->nullable();
            $table->string('Purchased_vifurushi')->nullable();
            $table->string('Sold_vifurushi')->nullable();
            $table->string('Credit_vifurushi')->nullable();
            $table->string('Vifurushi_balance')->nullable();
            $table->string('Offer_Vifurushi')->nullable();
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
        Schema::dropIfExists('vifurushi_wallets');
    }
}
