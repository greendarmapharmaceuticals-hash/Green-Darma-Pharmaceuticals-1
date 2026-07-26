<?php

if (isset($_GET['test'])) {
    header('Content-Type: text/plain');
    echo "PHP is working on Vercel!\n";
    echo "PDO Drivers: " . implode(', ', PDO::getAvailableDrivers()) . "\n";
    echo "PHP Version: " . PHP_VERSION . "\n";
    echo "SQLite file exists: " . (file_exists(__DIR__ . '/../database/database.sqlite') ? 'YES' : 'NO') . "\n";
    exit;
}

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

try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo "<h1>Vercel Deployment Error</h1>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
