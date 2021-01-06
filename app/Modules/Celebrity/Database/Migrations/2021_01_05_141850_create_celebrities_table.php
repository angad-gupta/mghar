<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCelebritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrities', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->text('celeb_pic')->nullable();
            $table->date('dob')->nullable();
            $table->text('place_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->text('occupation')->nullable();
            $table->integer('genre_id')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('martial_status')->default(0);

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
        Schema::dropIfExists('celebrities');
    }
}
