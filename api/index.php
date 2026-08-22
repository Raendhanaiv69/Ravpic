<?php

// Forward Vercel requests to normal index.php
require __DIR__ . '/../vendor/autoload.php';

// Set cache and compiled paths to /tmp (writable directory in Vercel)
putenv('APP_SERVICES_CACHE=/tmp/services.php');
putenv('APP_PACKAGES_CACHE=/tmp/packages.php');
putenv('APP_CONFIG_CACHE=/tmp/config.php');
putenv('APP_ROUTES_CACHE=/tmp/routes.php');
putenv('APP_EVENTS_CACHE=/tmp/events.php');
putenv('VIEW_COMPILED_PATH=/tmp/views');

// Ensure the storage directories exist in /tmp
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0755, true);
}
if (!is_dir('/tmp/sessions')) {
    mkdir('/tmp/sessions', 0755, true);
}

require __DIR__ . '/../public/index.php';