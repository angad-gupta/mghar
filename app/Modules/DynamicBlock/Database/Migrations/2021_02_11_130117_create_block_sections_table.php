<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlockSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('block_sections', function (Blueprint $table) {
            $table->increments('id');

            $table->text('block_section')->nullable();
            $table->integer('sort_order')->nullable();
            $table->string('is_scripted_ads')->nullable();
            $table->text('scripted_ads')->nullable();
            $table->text('ads_title')->nullable();
            $table->text('ads_image')->nullable();

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
        Schema::dropIfExists('block_sections');
    }
}
