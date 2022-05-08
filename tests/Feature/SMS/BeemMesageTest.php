<?php

use Tomsgad\Beem\SMS\BeemMessage;

it('can set message content', function () {
    $message = BeemMessage::create('Test Message');

    expect($message->content)->tobe('Test Message');
});
