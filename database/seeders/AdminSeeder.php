<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@greendarma.com'],
            [
                'name' => 'System Administrator',
                'password' => Hash::make(env('ADMIN_DEFAULT_PASSWORD', 'GreenDarmaAdmin2026!')),
                'role' => 'super_admin',
                'status' => 'active',
            ]
        );
    }
}
