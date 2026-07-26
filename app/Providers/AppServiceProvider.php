<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $companySetting = null;
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                    $companySetting = cache()->remember('company_setting_global', 3600, function () {
                        return \App\Models\CompanySetting::first();
                    });
                }
            } catch (\Throwable $e) {
                $companySetting = null;
            }

            if (!$companySetting) {
                $companySetting = new \App\Models\CompanySetting([
                    'company_name' => 'Green Darma Pharmaceuticals',
                    'email' => 'info@greendarma.com',
                    'phone' => '+880 1700-000000',
                    'address' => 'Dhaka, Bangladesh',
                    'about' => 'Leading pharmaceutical formulation company committed to excellence and regulatory compliance.',
                ]);
            }

            $pageSlug = request()->is('/') ? 'home' : (request()->is('about') ? 'about' : (request()->is('products*') ? 'products' : ''));
            $seoSetting = null;
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('seo_settings')) {
                    $seoSetting = cache()->remember("seo_setting_{$pageSlug}", 3600, function () use ($pageSlug) {
                        return \App\Models\SeoSetting::where('page', $pageSlug)->first();
                    });
                }
            } catch (\Throwable $e) {
                $seoSetting = null;
            }

            $view->with('companySetting', $companySetting)
                 ->with('seoSetting', $seoSetting);
        });
    }
}
