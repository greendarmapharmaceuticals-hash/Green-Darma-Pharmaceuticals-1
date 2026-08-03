<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // NOTE: For immediate access via deployment, this sets a known temporary password.
        // Security: change the password after first login and remove this hardcoded value when done.
        Admin::updateOrCreate(
            ['email' => 'admin@greendarma.com'],
            [
                'name' => 'System Administrator',
                // Temporary fixed password for deploy convenience — change later.
                'password' => Hash::make('admin@greendarma'),
                'role' => 'super_admin',
                'status' => 'active',
            ]
        );
    }
}
