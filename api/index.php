<?php

// Vercel Serverless Entrypoint for Laravel

// Initialize writable storage directory in /tmp
$storagePaths = [
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storagePaths as $path) {
    if (! is_dir($path)) {
        @mkdir($path, 0755, true);
    }
}

// Copy seeded database to /tmp if using sqlite
$tmpDb = '/tmp/database.sqlite';
$sourceDb = __DIR__.'/../database/database.sqlite';

if (! file_exists($tmpDb)) {
    if (file_exists($sourceDb)) {
        @copy($sourceDb, $tmpDb);
    } else {
        @touch($tmpDb);
    }
}

// Fallback configuration if not set in Vercel UI
if (! getenv('APP_KEY')) {
    putenv('APP_KEY=base64:sVX3IR1qXlp9xeubpuiuVi8yxx/5KBUiPd/2UuSE44w=');
}

putenv('VERCEL=1');
putenv('APP_URL=https://rinahazarika-clothing.vercel.app');
putenv('ASSET_URL=https://rinahazarika-clothing.vercel.app');
putenv('APP_STORAGE=/tmp/storage');
putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');
putenv('SESSION_DRIVER=cookie');
putenv('CACHE_STORE=array');
putenv('LOG_CHANNEL=stderr');
putenv('DB_CONNECTION=sqlite');
putenv('DB_DATABASE='.$tmpDb);

$_SERVER['HTTPS'] = 'on';
$_SERVER['SERVER_PORT'] = 443;
$_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';

// Forward to standard Laravel public/index.php
require __DIR__.'/../public/index.php';
