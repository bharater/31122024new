<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('mission_title')->nullable();
            $table->text('mission_description')->nullable();
            $table->string('mission_image')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_description')->nullable();
            $table->string('vision_image')->nullable();
            $table->string('values_title')->nullable();
            $table->text('values_description')->nullable();
            $table->string('values_image')->nullable();
            $table->string('project_6_title')->nullable();
            $table->text('project_6_description')->nullable();
            $table->string('project_6_image')->nullable();
            $table->string('project_7_title')->nullable();
            $table->text('project_7_description')->nullable();
            $table->string('project_7_image')->nullable();
            $table->string('project_8_title')->nullable();
            $table->text('project_8_description')->nullable();
            $table->string('project_8_image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
};