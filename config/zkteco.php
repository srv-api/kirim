<?php

return [
    /*
    |--------------------------------------------------------------------------
    | ZKTeco Configuration
    |--------------------------------------------------------------------------
    */

    // Default device connection
    'ip' => env('ZKTEKO_IP', 'http://solutioncloud.co.id'),
    // 'port' => env('ZKTEKO_PORT', 80),

    // Connection settings
    'connection_timeout' => env('ZKTEKO_CONNECTION_TIMEOUT', 30),
    'max_retries' => env('ZKTEKO_MAX_RETRIES', 3),

    // Node.js API (optional)
    'use_node_api' => env('ZKTEKO_USE_NODE_API', false),
    'node_api_url' => env('ZKTEKO_NODE_API_URL', 'http://localhost:3000'),

    // Enroll settings
    'enroll_timeout' => env('ZKTEKO_ENROLL_TIMEOUT', 60),
    'max_enroll_attempts' => env('ZKTEKO_MAX_ENROLL_ATTEMPTS', 3),

    // Sync settings
    'sync_attendance_limit' => env('ZKTEKO_SYNC_ATTENDANCE_LIMIT', 1000),

    // Cache settings
    'cache_connection' => env('ZKTEKO_CACHE_CONNECTION', true),
    'cache_ttl' => env('ZKTEKO_CACHE_TTL', 300), // 5 minutes

    // Fingerprint settings
    'max_fingers_per_user' => env('ZKTEKO_MAX_FINGERS', 10),
    'finger_ids' => [
        0 => 'Right Thumb',
        1 => 'Right Index',
        2 => 'Right Middle',
        3 => 'Right Ring',
        4 => 'Right Little',
        5 => 'Left Thumb',
        6 => 'Left Index',
        7 => 'Left Middle',
        8 => 'Left Ring',
        9 => 'Left Little',
    ],

    // Role mapping
    'roles' => [
        0 => 'User',
        1 => 'Supervisor',
        2 => 'Admin',
        3 => 'Manager',
        4 => 'Director',
    ],

    // Logging
    'log_commands' => env('ZKTEKO_LOG_COMMANDS', true),
    'log_level' => env('ZKTEKO_LOG_LEVEL', 'info'),
];