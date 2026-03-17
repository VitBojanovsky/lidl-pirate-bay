<?php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

if (str_starts_with($path, '/files/')) {
    http_response_code(403);
    echo "Forbidden";
    exit;
}

$file = __DIR__ . $path;
if ($path !== '/' && file_exists($file) && !is_dir($file)) {
    return false;
}

require __DIR__ . '/index.html';