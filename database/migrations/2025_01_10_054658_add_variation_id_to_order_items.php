<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Add variation_id column after product_color_id
            $table->unsignedBigInteger('variation_id')->nullable()->after('product_color_id');

            // Add foreign key constraint
            $table->foreign('variation_id')
                  ->references('id')
                  ->on('variation_combinations')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // Drop foreign key first
            $table->dropForeign(['variation_id']);

            // Then drop the column
            $table->dropColumn('variation_id');
        });
    }
};
