<?php

// Prepare writable storage directories in /tmp for Vercel Serverless environment
$storagePath = sys_get_temp_dir() . '/storage';
$dirs = [
    $storagePath . '/framework/views',
    $storagePath . '/framework/cache/data',
    $storagePath . '/framework/sessions',
    $storagePath . '/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Copy sqlite database to /tmp if present for writable database access in Serverless
$sqliteSource = __DIR__ . '/../database/database.sqlite';
$sqliteTmp = sys_get_temp_dir() . '/database.sqlite';
if (file_exists($sqliteSource) && !file_exists($sqliteTmp)) {
    @copy($sqliteSource, $sqliteTmp);
}

// Override storage & compiled view locations for serverless execution
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
$_ENV['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";

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

