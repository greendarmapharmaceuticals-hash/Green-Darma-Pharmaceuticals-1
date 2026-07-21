<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product') ? $this->route('product')->id : null;

        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($productId)],
            'category_id' => ['nullable', 'exists:categories,id'],
            'generic_name' => ['required', 'string', 'max:255'],
            'brand_name' => ['nullable', 'string', 'max:255'],
            'strength' => ['nullable', 'string', 'max:255'],
            'dosage_form' => ['nullable', 'string', 'max:255'],
            'pack_size' => ['nullable', 'string', 'max:255'],
            'manufacturer' => ['nullable', 'string', 'max:255'],
            'dar_number' => ['nullable', 'string', 'max:255'],
            'active_ingredients' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'market_price_range' => ['nullable', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'full_description' => ['nullable', 'string'],
            'pharmacology' => ['nullable', 'string'],
            'indications' => ['nullable', 'string'],
            'dosage' => ['nullable', 'string'],
            'side_effects' => ['nullable', 'string'],
            'contraindications' => ['nullable', 'string'],
            'precautions' => ['nullable', 'string'],
            'pregnancy_lactation' => ['nullable', 'string'],
            'drug_interactions' => ['nullable', 'string'],
            'warnings' => ['nullable', 'string'],
            'storage' => ['nullable', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:published,draft,archived'],
            'is_featured' => ['boolean'],
        ];
    }
}
