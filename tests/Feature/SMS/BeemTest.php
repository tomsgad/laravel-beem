<?php

use Tomsgad\Beem\SMS\Beem;

it('can be instantiate', function () {
    $testConfig = [
        'sms' => [
            'sender_name' => 'INFO',
            'api_key' => 'testApiKey',
            'secret_key' => 'testSecretKey',
        ],
    ];

    $beem = new Beem($testConfig);

    expect($beem)->toBeInstanceOf(Beem::class);
});
