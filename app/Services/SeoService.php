<?php

namespace App\Services;

use App\Models\CompanySetting;
use App\Models\Product;

class SeoService
{
    /**
     * Generate JSON-LD Schema for a Product Page.
     */
    public function generateProductSchema(Product $product): array
    {
        $company = CompanySetting::first();
        
        $schema = [
            '@context' => 'https://schema.org/',
            '@type' => 'Product',
            'name' => $product->name,
            'image' => ($product->featured_image && file_exists(public_path($product->featured_image))) ? [asset($product->featured_image)] : [asset('favicon.ico')],
            'description' => $product->meta_description ?: $product->short_description,
            'sku' => 'GDP-' . $product->id,
            'brand' => [
                '@type' => 'Brand',
                'name' => $product->brand_name ?: 'Green Darma',
            ],
            'manufacturer' => [
                '@type' => 'Organization',
                'name' => $product->manufacturer ?: 'Green Darma Pharmaceuticals',
            ],
            'category' => $product->category->name ?? 'Pharmaceuticals',
            'activeIngredient' => $product->active_ingredients,
        ];

        if ($product->price && $product->price > 0) {
            $schema['offers'] = [
                '@type' => 'Offer',
                'url' => route('products.show', $product->slug),
                'priceCurrency' => 'BDT',
                'price' => number_format((float)$product->price, 2, '.', ''),
                'availability' => 'https://schema.org/InStock',
                'itemCondition' => 'https://schema.org/NewCondition',
            ];
        }

        return $schema;
    }

    /**
     * Generate JSON-LD Schema for Product FAQs.
     */
    public function generateFaqSchema(Product $product): ?array
    {
        if ($product->faqs->isEmpty()) {
            return null;
        }

        $questions = [];
        foreach ($product->faqs as $faq) {
            $questions[] = [
                '@type' => 'Question',
                'name' => $faq->question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq->answer,
                ],
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $questions,
        ];
    }

    /**
     * Generate JSON-LD Schema for Organization.
     */
    public function generateOrganizationSchema(): array
    {
        $company = CompanySetting::first();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $company->company_name ?? 'Green Darma Pharmaceuticals',
            'url' => url('/'),
            'logo' => ($company?->logo && file_exists(public_path($company->logo))) ? asset($company->logo) : asset('favicon.ico'),
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => $company->phone ?? '+880 1700-000000',
                'contactType' => 'customer service',
                'email' => $company->email ?? 'info@greendarma.com',
            ],
            'sameAs' => array_filter([
                $company?->facebook,
                $company?->linkedin,
                $company?->youtube,
            ]),
        ];
    }

    /**
     * Generate JSON-LD Schema for Breadcrumbs.
     */
    public function generateBreadcrumbSchema(array $items): array
    {
        $itemList = [];
        foreach ($items as $index => $item) {
            $itemList[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'],
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $itemList,
        ];
    }
}
