<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    public function run(): void
    {
        CompanySetting::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'Green Darma Pharmaceuticals',
                'about' => 'Green Darma Pharmaceuticals is a leading healthcare company dedicated to producing high-quality, clinical-grade pharmaceutical preparations and healthcare solutions in Bangladesh.',
                'address' => 'Corporate Head Office, Dhaka, Bangladesh',
                'phone' => '+880 1700-000000',
                'email' => 'info@greendarma.com',
                'website' => 'https://greendarma.com',
                'facebook' => 'https://facebook.com/greendarma',
                'linkedin' => 'https://linkedin.com/company/greendarma',
                'youtube' => 'https://youtube.com/c/greendarma',
                'footer_text' => '© 2026 Green Darma Pharmaceuticals. All rights reserved. Medical information provided on this platform is for educational purposes only.',
            ]
        );
    }
}
