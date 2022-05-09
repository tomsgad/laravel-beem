<?php

it('can get sms api key from env file', function () {
    expect(config('beem.sms.api_key'))->toBe('testApiKey');
});

it('can get sms secret key from env file', function () {
    expect(config('beem.sms.secret_key'))->toBe('testSecretKey');
});

it('can get sms sender name from env file', function () {
    expect(config('beem.sms.sender_name'))->toBe('INFO');
});
