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

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '902536234382-1n7bp9vqhmhr7qte5k6tm4buj9k84r61.apps.googleusercontent.com',
        'client_secret' => '1Lskzn0sF7U96_4-m6EjwVsa',
        'redirect' => '/auth/google/callback',
    ],
    'facebook' => [
      'client_id' => '2381214602021925',
      'client_secret' => 'b4ac5b509e39a8368eb38ecb8cc3961e',
      'redirect' => '/auth/facebook/callback',
    ],

];
