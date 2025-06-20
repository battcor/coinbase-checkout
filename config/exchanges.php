<?php

return [
    'default' => env('EXCHANGE_DEFAULT'),

    'coinbase' => [
        'hosted_payment_url' => env('COINBASE_HOSTED_PAYMENT_URL'),
    ],

    'binance' => [
        'hosted_payment_url' => env('BINANCE_HOSTED_PAYMENT_URL'),
    ]
];