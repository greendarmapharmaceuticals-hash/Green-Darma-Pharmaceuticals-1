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
        \Illuminate\Support\Facades\View::composer('layouts.app', function ($view) {
            $companySetting = cache()->remember('company_setting_global', 3600, function () {
                return \App\Models\CompanySetting::first();
            });

            $pageSlug = request()->is('/') ? 'home' : (request()->is('about') ? 'about' : (request()->is('products*') ? 'products' : ''));
            $seoSetting = cache()->remember("seo_setting_{$pageSlug}", 3600, function () use ($pageSlug) {
                return \App\Models\SeoSetting::where('page', $pageSlug)->first();
            });

            $view->with('companySetting', $companySetting)
                 ->with('seoSetting', $seoSetting);
        });
    }
}
