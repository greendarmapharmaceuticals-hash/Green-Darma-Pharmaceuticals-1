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

// Override storage & compiled view locations for serverless execution
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
$_ENV['VIEW_COMPILED_PATH'] = "{$storagePath}/framework/views";

// Forward Vercel request to Laravel entrypoint
require __DIR__ . '/../public/index.php';
