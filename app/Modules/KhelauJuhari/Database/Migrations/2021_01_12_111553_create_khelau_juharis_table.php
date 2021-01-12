<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhelauJuharisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khelau_juharis', function (Blueprint $table) {
            $table->increments('id');

            $table->text('kj_title')->nullable();
            $table->text('kj_cover_image')->nullable();
            $table->text('kj_embeded_url')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->double('total_views',14,2)->nullable();

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
        Schema::dropIfExists('khelau_juharis');
    }
}