<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->increments('id');

            $table->text('username')->nullable();
            $table->text('password')->nullable();
            $table->text('full_name');
            $table->text('email');
            $table->string('mobile_no')->nullable();
            $table->text('provider_id')->nullable();
            $table->boolean('is_external_authenticate')->default(0);
            $table->boolean('status')->default(0);
            $table->boolean('email_verified')->default(0);
            $table->text('provider')->nullable();
            $table->text('user_type');
            $table->text('registered_ip');
            $table->rememberToken();

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
        Schema::dropIfExists('subscribers');
    }
}
