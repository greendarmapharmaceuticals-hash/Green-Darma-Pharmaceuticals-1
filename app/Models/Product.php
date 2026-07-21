<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'generic_name',
        'brand_name',
        'strength',
        'dosage_form',
        'pack_size',
        'manufacturer',
        'dar_number',
        'active_ingredients',
        'price',
        'market_price_range',
        'short_description',
        'full_description',
        'pharmacology',
        'indications',
        'dosage',
        'side_effects',
        'contraindications',
        'precautions',
        'pregnancy_lactation',
        'drug_interactions',
        'warnings',
        'storage',
        'featured_image',
        'seo_title',
        'meta_description',
        'meta_keywords',
        'image_alt',
        'status',
        'is_featured',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order', 'asc');
    }

    public function faqs(): HasMany
    {
        return $this->hasMany(ProductFaq::class)->orderBy('sort_order', 'asc');
    }
}
