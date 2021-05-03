<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideoNameToVideoAdsLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_ads_logs', function (Blueprint $table) {
            $table->string('video_ads_name')->nullable()->after('id');
            $table->string('video_name')->nullable()->after('video_ads_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_ads_logs', function (Blueprint $table) {

        });
    }
}
