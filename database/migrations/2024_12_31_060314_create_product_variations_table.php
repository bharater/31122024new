<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_variations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('values');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_variations');
    }
}
