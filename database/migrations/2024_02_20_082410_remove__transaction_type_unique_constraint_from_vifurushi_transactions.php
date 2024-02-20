<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTransactionTypeUniqueConstraintFromVifurushiTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vifurushi_transactions', function (Blueprint $table) {
            $table->dropUnique('transaction_type');
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
