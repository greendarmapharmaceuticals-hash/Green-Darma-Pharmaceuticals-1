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
            $table->string('availability_status')->nullable()->after('status');
            $table->string('therapeutic_class')->nullable()->after('category_id');
            $table->longText('mechanism_of_action')->nullable()->after('pharmacology');
            $table->text('directions_for_use')->nullable()->after('dosage');
            $table->text('overdose_information')->nullable()->after('storage');
            $table->text('references_list')->nullable()->after('overdose_information');
            $table->text('related_products_list')->nullable()->after('references_list');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'availability_status',
                'therapeutic_class',
                'mechanism_of_action',
                'directions_for_use',
                'overdose_information',
                'references_list',
                'related_products_list',
            ]);
        });
    }
};
