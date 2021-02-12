<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdsUrlField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('block_sections', function (Blueprint $table) {
            $table->text('ads_url')->nullable()->after('ads_title');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('block_sections', function (Blueprint $table) {
            $table->dropColumn('ads_url');
        });
    }
}


