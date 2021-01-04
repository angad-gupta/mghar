<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('genre_id');
            $table->text('video_title')->nullable();
            $table->text('video_cover_image')->nullable();
            $table->text('video_embeded_url')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->double('total_views',14,2)->nullable();
            $table->boolean('is_popular')->default(0);
            $table->boolean('is_trending')->default(0);

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
        Schema::dropIfExists('videos');
    }
}
