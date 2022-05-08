<?php

return [
    'sms' => [
        /*
        |--------------------------------------------------------------------------
        | Beem SMS API Key
        |--------------------------------------------------------------------------
        |
        | Here we set sms api key that will be used to send the sms. Get your
        | credentials from https://sms.beem.africa/#!/dashboard/profile/authentication
        |
        */
        'api_key' => env('BEEM_SMS_API_KEY', ''),

        /*
        |--------------------------------------------------------------------------
        | Beem SMS Secret Key
        |--------------------------------------------------------------------------
        |
        | Here we set sms secret key that will be used to send the sms. Get your
        | credentials from https://sms.beem.africa/#!/dashboard/profile/authentication
        |
        */
        'secret_key' => env('BEEM_SMS_SECRET_KEY', ''),

        /*
        |--------------------------------------------------------------------------
        | Beem SMS Sender Name
        |--------------------------------------------------------------------------
        |
        | Here we set a sender name that will be used to send the sms. Default
        | sender name is `INFO`. Please only use sender names that have been registered
        | or the sms will not be sent.
        |
        */

        'sender_name' => env('BEEM_SMS_SENDER_NAME', ''),
    ]
];
