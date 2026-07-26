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
        Schema::table('products', function (Blueprint $table) {
            $table->index(['status', 'is_featured'], 'idx_products_status_featured');
            $table->index(['status', 'name'], 'idx_products_status_name');
            $table->index(['status', 'generic_name'], 'idx_products_status_generic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_status_featured');
            $table->dropIndex('idx_products_status_name');
            $table->dropIndex('idx_products_status_generic');
        });
    }
};
