<?php

namespace Tomsgad\Beem\SMS;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Beem
{
    public string $apiKey;
    public string $secretKey;
    public string $senderName;

    public string $smsApiUrl = 'https://apisms.beem.africa/v1/send';

    public function __construct(array $config)
    {
        $this->apiKey = $config['sms.api_key'];
        $this->secretKey = $config['sms.secret_key'];
        $this->senderName = $config['sms.sender_name'];
    }

    public function sendMessage(BeemMessage $message, $recipients): string
    {
        $client = new Client;

        try {
            if ($message->sender && $message->apiKey && $message->secretKey) {
                $response = $client->post($this->smsApiUrl, [
                    'auth' => [$message->apiKey, $message->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'source_addr' => $message->sender,
                        'message' => $message->content,
                        'encoding' => 0,
                        'recipients' => $recipients,
                    ],
                ]);
            } else {
                $response = $client->post($this->smsApiUrl, [
                    'auth' => [$this->apiKey, $this->secretKey],
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json',
                    ],
                    'json' => [
                        'source_addr' => $this->senderName,
                        'message' => $message->content,
                        'encoding' => 0,
                        'recipients' => $recipients,
                    ],
                ]);
            }
        } catch (GuzzleException $error) {
            return $error;
        }

        return $response->getBody()->getContents();
    }
}
