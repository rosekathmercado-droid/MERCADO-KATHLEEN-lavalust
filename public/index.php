<?php

define('PREVENT_DIRECT_ACCESS', TRUE);

/**
 * ------------------------------------------------------------------
 * CORS / Preflight Handling
 * ------------------------------------------------------------------
 */

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

$allowed_origins = [
    'http://localhost:5173',
    'http://127.0.0.1:5173',
    'https://lab6-react-kathleen.onrender.com'
];

if (in_array($origin, $allowed_origins, true)) {
    header("Access-Control-Allow-Origin: {$origin}");
    header('Access-Control-Allow-Credentials: true');
}

header('Access-Control-Allow-Headers: Authorization, Content-Type, X-Requested-With, X-RateLimit-Limit, X-RateLimit-Remaining, X-RateLimit-Reset');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, PATCH, OPTIONS');
header('Access-Control-Max-Age: 3600');

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'OPTIONS') {
    http_response_code(204);
    exit;
}

/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC framework
 * ------------------------------------------------------------------
 */

$system_path = 'scheme';

$application_folder = 'app';

$public_folder = 'public';

/*
 * ------------------------------------------------------
 * Define Application Constants
 * ------------------------------------------------------
 */

define('ROOT_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('SYSTEM_DIR', ROOT_DIR . $system_path . DIRECTORY_SEPARATOR);
define('APP_DIR', ROOT_DIR . $application_folder . DIRECTORY_SEPARATOR);
define('PUBLIC_DIR', $public_folder);

/*
 * ------------------------------------------------------
 * Start LavaLust
 * ------------------------------------------------------
 */

require_once SYSTEM_DIR . 'kernel/LavaLust.php';