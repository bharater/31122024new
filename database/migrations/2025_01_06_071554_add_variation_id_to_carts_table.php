<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVariationIdToCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            if (!Schema::hasColumn('carts', 'variation_id')) {
                $table->unsignedBigInteger('variation_id')->nullable()->after('product_id');
                $table->foreign('variation_id')->references('id')->on('variations')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            if (Schema::hasColumn('carts', 'variation_id')) {
                $table->dropForeign(['variation_id']);
                $table->dropColumn('variation_id');
            }
        });
    }
}
