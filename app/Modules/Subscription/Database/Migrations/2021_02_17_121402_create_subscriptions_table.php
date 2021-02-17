<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->increments('id');

            $table->text('subsription_title')->nullable();
            $table->string('is_one_month')->nullable();
            $table->string('one_month_feature')->nullable();
            $table->string('is_three_month')->nullable();
            $table->string('three_month_feature')->nullable();
            $table->string('is_six_month')->nullable();
            $table->string('six_month_feature')->nullable();
            $table->string('is_one_year')->nullable();
            $table->string('one_year_feature')->nullable();

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
        Schema::dropIfExists('subscriptions');
    }
}

