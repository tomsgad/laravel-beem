<?php

namespace Tomsgad\Beem\SMS;

class BeemMessage
{
    public string $content = '';
    public string $sender = '';
    public string $apiKey = '';
    public string $secretKey = '';

    /**
     * @param string $content
     */
    public function __construct(string $content = '')
    {
        $this->content = $content;
    }

    /**
     * @param string $content
     * @return BeemMessage
     */
    public function content(string $content): BeemMessage
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param string $sender
     * @return BeemMessage
     */
    public function sender(string $sender): BeemMessage
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * @param string $apiKey
     * @return BeemMessage
     */
    public function apiKey(string $apiKey): BeemMessage
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @param string $secretKey
     * @return BeemMessage
     */
    public function secretKey(string $secretKey): BeemMessage
    {
        $this->secretKey = $secretKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getSender(): string
    {
        return $this->sender;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }
}
