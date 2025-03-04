<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('variation_combinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('combination_string'); // e.g., "Color:Red,RAM:4GB"
            $table->decimal('price', 10, 2)->default(0);
            $table->integer('quantity')->default(0);
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('product_id')
                  ->references('id')
                  ->on('products')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('variation_combinations');
    }
};