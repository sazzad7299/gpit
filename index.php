<?php

// Check if the request is for a static file like CSS
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// Serve static files (like CSS, JS, images) if they exist in the 'public' directory
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

// Forward other requests to Laravel's main entry point
require_once __DIR__.'/public/index.php';
