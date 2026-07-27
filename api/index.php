<?php

// Prepare writable storage directories in /tmp for Vercel Serverless environment
$storagePath = sys_get_temp_dir() . '/storage';
$dirs = [
    $storagePath . '/framework/views',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/framework/testing',
    $storagePath . '/logs',
    $storagePath . '/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Redirect all Laravel writable paths to /tmp/storage
putenv("LARAVEL_STORAGE_PATH={$storagePath}");
$_ENV['LARAVEL_STORAGE_PATH'] = $storagePath;
$_SERVER['LARAVEL_STORAGE_PATH'] = $storagePath;

putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
$_ENV['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";
$_SERVER['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";

putenv("APP_SERVICES_CACHE={$storagePath}/bootstrap/cache/services.php");
putenv("APP_PACKAGES_CACHE={$storagePath}/bootstrap/cache/packages.php");
putenv("APP_ROUTES_CACHE={$storagePath}/bootstrap/cache/routes-v7.php");
putenv("APP_CONFIG_CACHE={$storagePath}/bootstrap/cache/config.php");
putenv("APP_EVENTS_CACHE={$storagePath}/bootstrap/cache/events.php");

$_ENV['APP_SERVICES_CACHE'] = "{$storagePath}/bootstrap/cache/services.php";
$_ENV['APP_PACKAGES_CACHE'] = "{$storagePath}/bootstrap/cache/packages.php";
$_ENV['APP_ROUTES_CACHE'] = "{$storagePath}/bootstrap/cache/routes-v7.php";
$_ENV['APP_CONFIG_CACHE'] = "{$storagePath}/bootstrap/cache/config.php";
$_ENV['APP_EVENTS_CACHE'] = "{$storagePath}/bootstrap/cache/events.php";

$_SERVER['APP_SERVICES_CACHE'] = "{$storagePath}/bootstrap/cache/services.php";
$_SERVER['APP_PACKAGES_CACHE'] = "{$storagePath}/bootstrap/cache/packages.php";
$_SERVER['APP_ROUTES_CACHE'] = "{$storagePath}/bootstrap/cache/routes-v7.php";
$_SERVER['APP_CONFIG_CACHE'] = "{$storagePath}/bootstrap/cache/config.php";
$_SERVER['APP_EVENTS_CACHE'] = "{$storagePath}/bootstrap/cache/events.php";

// Copy sqlite database to /tmp for serverless execution
$possibleSources = [
    __DIR__ . '/../database/database.sqlite',
    dirname(__DIR__) . '/database/database.sqlite',
    __DIR__ . '/../green_darma_db',
    dirname(__DIR__) . '/green_darma_db',
];

$sqliteSource = null;
foreach ($possibleSources as $source) {
    if (file_exists($source) && filesize($source) > 0) {
        $sqliteSource = $source;
        break;
    }
}

$sqliteTmp = sys_get_temp_dir() . '/database.sqlite';

if ($sqliteSource && file_exists($sqliteSource)) {
    if (!file_exists($sqliteTmp) || filesize($sqliteTmp) === 0) {
        @copy($sqliteSource, $sqliteTmp);
        @chmod($sqliteTmp, 0666);
    }
}

if (!file_exists($sqliteTmp)) {
    @touch($sqliteTmp);
    @chmod($sqliteTmp, 0666);
}

putenv("DB_CONNECTION=sqlite");
$_ENV['DB_CONNECTION'] = 'sqlite';
$_SERVER['DB_CONNECTION'] = 'sqlite';

putenv("DB_DATABASE={$sqliteTmp}");
$_ENV['DB_DATABASE'] = $sqliteTmp;
$_SERVER['DB_DATABASE'] = $sqliteTmp;

// Register Composer Autoloader
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel Application
/** @var \Illuminate\Foundation\Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Auto-repair database: Check if company_settings table exists
try {
    if (!\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
        $copied = false;
        if ($sqliteSource && file_exists($sqliteSource)) {
            @copy($sqliteSource, $sqliteTmp);
            @chmod($sqliteTmp, 0666);
            $copied = true;
        }

        if (!$copied || !\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
            \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        }
    }
} catch (\Throwable $e) {
    error_log('Database setup error: ' . $e->getMessage());
}

// Forward request to Laravel application
$app->handleRequest(\Illuminate\Http\Request::capture());



