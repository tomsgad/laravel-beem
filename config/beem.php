<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Beem SMS API Credentials
    |--------------------------------------------------------------------------
    |
    | Here we set api key and secret key that will be used to send the sms. Get your
    | credentials from https://sms.beem.africa/#!/dashboard/profile/authentication
    |
    */

    'sms_api_key'    => env('BEEM_SMS_API_KEY', ''),
    'sms_secret_key' => env('BEEM_SMS_SECRET_KEY', ''),

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

    'sms_sender_name' => env('BEEM_SMS_SENDER_NAME', ''),
];
