<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    protected $signature = 'greendarma:create-admin {email} {name} {password}';

    protected $description = 'Create or update an admin user with the given credentials';

    public function handle(): int
    {
        $email = $this->argument('email');
        $name = $this->argument('name');
        $password = $this->argument('password');

        $admin = Admin::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
                'role' => 'super_admin',
                'status' => 'active',
            ]
        );

        $this->info('Admin user created/updated: ' . $admin->email);
        return 0;
    }
}
