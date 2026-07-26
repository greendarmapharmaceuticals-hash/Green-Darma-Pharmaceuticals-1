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

putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
$_ENV['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";

putenv("APP_SERVICES_CACHE={$storagePath}/bootstrap/cache/services.php");
$_ENV['APP_SERVICES_CACHE'] = "{$storagePath}/bootstrap/cache/services.php";

putenv("APP_PACKAGES_CACHE={$storagePath}/bootstrap/cache/packages.php");
$_ENV['APP_PACKAGES_CACHE'] = "{$storagePath}/bootstrap/cache/packages.php";

putenv("APP_CONFIG_CACHE={$storagePath}/bootstrap/cache/config.php");
$_ENV['APP_CONFIG_CACHE'] = "{$storagePath}/bootstrap/cache/config.php";

putenv("APP_ROUTES_CACHE={$storagePath}/bootstrap/cache/routes.php");
$_ENV['APP_ROUTES_CACHE'] = "{$storagePath}/bootstrap/cache/routes.php";

putenv("APP_EVENTS_CACHE={$storagePath}/bootstrap/cache/events.php");
$_ENV['APP_EVENTS_CACHE'] = "{$storagePath}/bootstrap/cache/events.php";

// Copy sqlite database to /tmp for serverless execution
$sqliteSource = __DIR__ . '/../database/database.sqlite';
$sqliteTmp = sys_get_temp_dir() . '/database.sqlite';

if (file_exists($sqliteSource)) {
    @copy($sqliteSource, $sqliteTmp);
}

if (file_exists($sqliteTmp)) {
    putenv("DB_CONNECTION=sqlite");
    $_ENV['DB_CONNECTION'] = 'sqlite';
    putenv("DB_DATABASE={$sqliteTmp}");
    $_ENV['DB_DATABASE'] = $sqliteTmp;
} elseif (file_exists($sqliteSource)) {
    putenv("DB_CONNECTION=sqlite");
    $_ENV['DB_CONNECTION'] = 'sqlite';
    putenv("DB_DATABASE={$sqliteSource}");
    $_ENV['DB_DATABASE'] = $sqliteSource;
}

// Forward Vercel request to Laravel entrypoint
require __DIR__ . '/../public/index.php';


