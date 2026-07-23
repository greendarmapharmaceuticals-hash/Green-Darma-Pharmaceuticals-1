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
        'therapeutic_class',
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
        'mechanism_of_action',
        'indications',
        'dosage',
        'directions_for_use',
        'side_effects',
        'contraindications',
        'precautions',
        'pregnancy_lactation',
        'drug_interactions',
        'warnings',
        'storage',
        'overdose_information',
        'references_list',
        'related_products_list',
        'featured_image',
        'seo_title',
        'meta_description',
        'meta_keywords',
        'image_alt',
        'status',
        'availability_status',
        'is_featured',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

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

    public function getBnIndicationsAttribute(): string
    {
        if (empty($this->indications)) return '';
        $text = $this->indications;
        $replacements = [
            'is indicated for the treatment of' => 'চিকিৎসায় নির্দেশিত',
            'is indicated for' => 'এর জন্য নির্দেশিত',
            'scabies and lice infestations' => 'খোসপাঁচড়া (Scabies) এবং উকুনের সংক্রমণ',
            'fungal skin infections' => 'ত্বকের ছত্রাকজনিত সংক্রমণ (Fungal skin infections)',
            'tinea corporis' => 'টিনিয়া কর্পোরিস (Tinea Corporis)',
            'tinea cruris' => 'টিনিয়া ক্রুরিস (Tinea Cruris)',
            'tinea pedis' => 'টিনিয়া পেডিস বা এথলিটস ফুট (Tinea Pedis)',
            'dandruff and seborrheic dermatitis' => 'খুশকি এবং সেবোরিক ডার্মাটাইটিস (Dandruff & Seborrheic Dermatitis)',
            'diarrhea and gut flora imbalances' => 'ডায়রিয়া এবং অন্ত্রের অনুজীবের ভারসাম্যহীনতা',
        ];
        return str_ireplace(array_keys($replacements), array_values($replacements), $text);
    }

    public function getBnPharmacologyAttribute(): string
    {
        if (empty($this->pharmacology)) return '';
        $text = $this->pharmacology;
        $replacements = [
            'is a synthetic pyrethroid active against' => 'হলো একটি সিন্থেটিক পাইরেথ্রয়েড যা কার্যকর',
            'acts on the nerve cell membrane of insects' => 'পোকা ও মাইটের নার্ভ সেলের মেমব্রেনের ওপর কাজ করে',
            'broad spectrum antifungal agent' => 'একটি ব্রড-স্পেকট্রাম অ্যান্টিফাঙ্গাল এজেন্ট',
            'inhibits the synthesis of ergosterol' => 'ফাঙ্গাসের এরগোস্টেরল সংশ্লেষণ প্রতিরোধ করে',
        ];
        return str_ireplace(array_keys($replacements), array_values($replacements), $text);
    }

    public function getBnDosageAttribute(): string
    {
        if (empty($this->dosage)) return '';
        $text = $this->dosage;
        $replacements = [
            'Apply once daily' => 'প্রতিদিন একবার ব্যবহার করুন',
            'Apply twice daily' => 'প্রতিদিন দুইবার ব্যবহার করুন',
            'Lather thoroughly on wet body' => 'ভেজা শরীরে ভালো করে ফেনা তৈরি করুন',
            'Leave for 5 to 10 minutes' => '৫ থেকে ১০ মিনিট রেখে দিন',
            'rinse off with warm water' => 'হালকা গরম পানি দিয়ে ধুয়ে ফেলুন',
            'Take 1 capsule daily' => 'প্রতিদিন ১টি ক্যাপসুল সেবন করুন',
            'as directed by a registered physician' => 'অথবা রেজিস্টার্ড চিকিৎসকের পরামর্শ অনুযায়ী ব্যবহার করুন',
        ];
        return str_ireplace(array_keys($replacements), array_values($replacements), $text);
    }

    public function getBnSideEffectsAttribute(): string
    {
        if (empty($this->side_effects)) return '';
        $text = $this->side_effects;
        $replacements = [
            'Mild burning, stinging, or skin redness' => 'সাময়িক হালকা জ্বালাপোড়া, চুলকানি বা লালচে ভাব',
            'may occur in rare sensitive individuals' => 'সংবেদনশীল ত্বকে দেখা দিতে পারে',
            'Generally well tolerated' => 'সাধারণত সুসহনীয়',
        ];
        return str_ireplace(array_keys($replacements), array_values($replacements), $text);
    }

    public function getBnStorageAttribute(): string
    {
        if (empty($this->storage)) return '';
        $text = $this->storage;
        $replacements = [
            'Store below 30°C' => '৩০° সে. এর নিচে সংরক্ষণ করুন',
            'in a dry place' => 'শুষ্ক স্থানে',
            'away from direct sunlight' => 'সরাসরি সূর্যালোক থেকে দূরে',
            'Keep out of reach of children' => 'শিশুদের নাগালের বাইরে রাখুন',
        ];
        return str_ireplace(array_keys($replacements), array_values($replacements), $text);
    }
}
