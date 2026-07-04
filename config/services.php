<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'google_maps' => [
        'key' => env('GOOGLE_MAPS_KEY', 'AIzaSyBuIGpd88y0f6afnqqdPyr7EH9SCvutwzs'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI', 'http://localhost:8000/auth/google/callback'),
    ],

    'peminjaman_api' => [
        'url' => env('PEMINJAMAN_API_URL', 'http://127.0.0.1:8001/api'),
        'webhook_secret' => env('WEBHOOK_SECRET', 'your_secure_webhook_secret_here'),
        'simaksi_webhook_url' => env('SIMAKSI_WEBHOOK_URL', 'http://127.0.0.1:8000/api/webhooks/peminjaman-status'),
        'simaksi_api_token' => env('SIMAKSI_API_TOKEN', null),
    ],

];
