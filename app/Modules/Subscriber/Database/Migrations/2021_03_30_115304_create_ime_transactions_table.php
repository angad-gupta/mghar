<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ime_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchant_code', 100)->nullable();
            $table->string('amount', 100)->nullable();
            $table->string('reference_id', 255)->nullable();
            $table->string('token_id', 100)->nullable();
            $table->string('transaction_id', 100)->nullable();
            $table->string('wallet_id', 100)->nullable();
            $table->tinyInteger('status')->nullable();
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
        Schema::dropIfExists('ime_transactions');
    }
}
