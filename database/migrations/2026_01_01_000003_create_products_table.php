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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->string('generic_name')->index();
            $table->string('brand_name')->default('Green Darma');
            $table->string('strength')->nullable();
            $table->string('dosage_form')->nullable();
            $table->string('pack_size')->nullable();
            $table->string('manufacturer')->default('Green Darma Pharmaceuticals');
            $table->string('dar_number')->nullable();
            $table->text('active_ingredients')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->string('market_price_range')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->longText('pharmacology')->nullable();
            $table->text('indications')->nullable();
            $table->text('dosage')->nullable();
            $table->text('side_effects')->nullable();
            $table->text('contraindications')->nullable();
            $table->text('precautions')->nullable();
            $table->text('pregnancy_lactation')->nullable();
            $table->text('drug_interactions')->nullable();
            $table->text('warnings')->nullable();
            $table->text('storage')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('image_alt')->nullable();
            $table->enum('status', ['published', 'draft', 'archived'])->default('published')->index();
            $table->boolean('is_featured')->default(false)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
