<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsUniqueConstraintFromVifurushiTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vifurushi_transactions', function (Blueprint $table) {
            $table->dropUnique('vifurushi_transactions_Value_unique');
            $table->dropUnique('vifurushi_transactions_Transaction_status_unique');
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
