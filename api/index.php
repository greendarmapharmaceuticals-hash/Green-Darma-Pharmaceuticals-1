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

// Copy sqlite database to /tmp for serverless execution
$sqliteSource = __DIR__ . '/../database/database.sqlite';
$sqliteTmp = sys_get_temp_dir() . '/database.sqlite';

if (file_exists($sqliteSource)) {
    if (!file_exists($sqliteTmp) || filesize($sqliteSource) !== filesize($sqliteTmp)) {
        @copy($sqliteSource, $sqliteTmp);
    }
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
