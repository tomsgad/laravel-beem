<?php

namespace Tomsgad\Beem\SMS;

class BeemMessage
{
    public string $content;

    public string $sender;

    public string $apiKey;

    public string $secretKey;

    public static function create(string $content): self
    {
        return new static($content);
    }

    public function __construct(string $content)
    {
        $this->content = $content;
    }
}
