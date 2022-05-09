<?php

use Tomsgad\Beem\SMS\Beem;

it('can be instantiate', function (){
    $testConfig = [
        'senderName' => 'INFO',
        'apiKey' => 'testApiKey',
        'secretKey' => 'testSecretKey',
    ];

    $beem = new Beem($testConfig);

    expect($beem)->toBeInstanceOf(Beem::class)
});
