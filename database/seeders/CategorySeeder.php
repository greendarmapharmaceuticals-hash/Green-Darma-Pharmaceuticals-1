<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Dermatology & Skin Care',
                'slug' => 'dermatology-skin-care',
                'description' => 'Specialized medicated soaps, topical lotions, and anti-dandruff scalp treatments for dermatological conditions.',
                'status' => 'active',
            ],
            [
                'name' => 'Gastroenterology & Gut Health',
                'slug' => 'gastroenterology-gut-health',
                'description' => 'Multi-strain probiotic supplements engineered for gut microbiome restoration and digestive wellness.',
                'status' => 'active',
            ],
            [
                'name' => 'Pediatrics & Child Healthcare',
                'slug' => 'pediatrics-child-healthcare',
                'description' => 'Pediatric multivitamin drops tailored for infant growth, skeletal strength, and rickets prevention.',
                'status' => 'active',
            ],
            [
                'name' => 'Orthopedics & Bone Health',
                'slug' => 'orthopedics-bone-health',
                'description' => 'Organic marine coral calcium and mineral formulations designed to support bone density and combat osteoporosis.',
                'status' => 'active',
            ],
            [
                'name' => 'General Vitality & Tonics',
                'slug' => 'general-vitality-tonics',
                'description' => 'Comprehensive multivitamin and multimineral oral syrups formulated to boost appetite and stamina.',
                'status' => 'active',
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );
        }
    }
}
