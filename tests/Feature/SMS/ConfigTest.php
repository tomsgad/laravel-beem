<?php

it('expect sms api key from env file', function () {
    expect(config('beem.sms.api_key'))->toBe('api_key');
});

it('expect sms secret key from env file', function () {
    expect(config('beem.sms.secret_key'))->toBe('secret_key');
});

it('expect sms sender name from env file', function () {
    expect(config('beem.sms.sender_name'))->toBe('MAGURU');
});
