<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1393784807406399',
        'client_secret' => 'a510513e1ef6d093d9a14518a5abf4ef',
            'redirect' => 'http://localhost:8000/callback',
    ],

    'google' => [
        'client_id' => '104962758697-7mnfb5kv0qn255u508knu6p08uk2bddj.apps.googleusercontent.com',
        'client_secret' => 'Vq9GLnl5axCMx6OvtRfTrYy2',
        'redirect' => 'http://localhost:8000/callback',
    ],

];
