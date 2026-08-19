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
        $company = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                $company = CompanySetting::first();
            }
        } catch (\Throwable $e) {}

        $aliases = array_filter(array_map('trim', explode(',', $product->search_aliases ?? '')));
        $keywords = array_filter(array_map('trim', explode(',', $product->meta_keywords ?? '')));
        $allAlternateNames = array_values(array_unique(array_filter(array_merge(
            [$product->generic_name, $product->brand_name, $product->name],
            $aliases
        ))));

        $imageUrl = ($product->featured_image && file_exists(public_path($product->featured_image)))
            ? asset($product->featured_image)
            : asset('favicon.ico');

        $schema = [
            '@context' => 'https://schema.org/',
            '@type' => ['Product', 'Drug', 'MedicalWebPage'],
            'name' => $product->name,
            'alternateName' => $allAlternateNames,
            'image' => [$imageUrl],
            'description' => strip_tags($product->meta_description ?: $product->short_description),
            'sku' => 'GDP-' . $product->id,
            'gtin8' => '000' . str_pad($product->id, 5, '0', STR_PAD_LEFT),
            'proprietaryName' => $product->brand_name ?: $product->name,
            'nonProprietaryName' => $product->generic_name,
            'activeIngredient' => $product->active_ingredients ?: $product->generic_name,
            'dosageForm' => $product->dosage_form ?: 'Pharmaceutical Formulation',
            'clinicalPharmacology' => strip_tags($product->pharmacology),
            'medicalCondition' => strip_tags($product->indications),
            'warning' => strip_tags($product->precautions ?: $product->warnings),
            'prescribingInfo' => route('products.show', $product->slug),
            'brand' => [
                '@type' => 'Brand',
                'name' => $product->brand_name ?: 'Green Darma',
            ],
            'manufacturer' => [
                '@type' => 'Organization',
                'name' => $product->manufacturer ?: 'Green Darma Pharmaceuticals',
                'url' => 'https://greendarmapharmaceuticals.com',
            ],
            'category' => $product->category->name ?? 'Pharmaceuticals',
            'keywords' => implode(', ', array_unique($keywords)),
        ];

        $effectivePrice = $product->effective_price ?? null;
        if ($effectivePrice !== null && $effectivePrice > 0) {
            $schema['offers'] = [
                '@type' => 'Offer',
                'price' => rtrim(rtrim(number_format((float)$effectivePrice, 2, '.', ''), '0'), '.'),
                'priceCurrency' => 'BDT',
                'priceValidUntil' => '2027-12-31',
                'itemCondition' => 'https://schema.org/NewCondition',
                'availability' => 'https://schema.org/InStock',
                'url' => route('products.show', $product->slug),
                'seller' => [
                    '@type' => 'Organization',
                    'name' => 'Green Darma Pharmaceuticals',
                    'url' => 'https://greendarmapharmaceuticals.com',
                ],
                'hasMerchantReturnPolicy' => [
                    '@type' => 'MerchantReturnPolicy',
                    'applicableCountry' => 'BD',
                    'returnPolicyCategory' => 'https://schema.org/MerchantReturnNotPermitted',
                ],
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
                'name' => trim($faq->question),
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => trim(strip_tags($faq->answer)),
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
        $company = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                $company = CompanySetting::first();
            }
        } catch (\Throwable $e) {}

        return [
            '@context' => 'https://schema.org',
            '@type' => ['Organization', 'MedicalBusiness'],
            'name' => $company->company_name ?? 'Green Darma Pharmaceuticals',
            'url' => 'https://greendarmapharmaceuticals.com',
            'logo' => ($company?->logo && file_exists(public_path($company->logo))) ? asset($company->logo) : asset('favicon.ico'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $company->address ?? 'Corporate Head Office',
                'addressLocality' => 'Dhaka',
                'addressCountry' => 'BD',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => $company->phone ?? '+880 1700-000000',
                'contactType' => 'customer service',
                'email' => $company->email ?? 'info@greendarmapharmaceuticals.com',
                'areaServed' => 'BD',
                'availableLanguage' => ['English', 'Bengali'],
            ],
            'sameAs' => array_values(array_filter([
                $company?->facebook ?: 'https://www.facebook.com/share/19HW9S44TA/',
                $company?->linkedin,
                $company?->youtube,
            ])),
        ];
    }

    /**
     * Generate JSON-LD Schema for WebSite SearchAction.
     */
    public function generateWebsiteSearchSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Green Darma Pharmaceuticals',
            'url' => 'https://greendarmapharmaceuticals.com',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => 'https://greendarmapharmaceuticals.com/products?search={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
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
