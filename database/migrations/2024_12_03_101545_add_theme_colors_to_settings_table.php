<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThemeColorsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('header_bg_color')->nullable();
            $table->string('footer_bg_color')->nullable();
            $table->string('link_color')->nullable();
            $table->string('font_color')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['header_bg_color', 'footer_bg_color', 'link_color', 'font_color']);
        });
    }
    }
