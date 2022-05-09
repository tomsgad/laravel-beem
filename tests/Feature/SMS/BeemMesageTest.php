<?php

use Tomsgad\Beem\SMS\BeemMessage;

it('can set message content', function () {
    $message = (new BeemMessage())->content('Test Message');

    expect($message->content)->toBe('Test Message');
});

it('can set message sender', function () {
    $message = (new BeemMessage())->sender('INFO');

    expect($message->sender)->toBe('INFO');
});

it('can set message api key', function () {
    $message = (new BeemMessage())->apiKey('TestApiKey');

    expect($message->apiKey)->toBe('TestApiKey');
});

it('can set message secret key', function () {
    $message = (new BeemMessage())->secretKey('TestSecretKey');

    expect($message->secretKey)->toBe('TestSecretKey');
});
