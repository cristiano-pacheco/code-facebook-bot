<?php

namespace CodeBot;

use GuzzleHttp\Client;

class CallSendApi
{
    const URL = 'https://graph.facebook.com/v2.6/me/messages';

    /**
     * @var string
     */
    private $pageAccessToken;

    /**
     * CallSendApi constructor.
     * @param string $pageAccessToken
     */
    public function __construct(string $pageAccessToken)
    {
        $this->pageAccessToken = $pageAccessToken;
    }

    /**
     * @param array $message
     * @param string|null $url
     * @param string $method
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function make(array $message, string $url = null, $method = 'POST'): string
    {
        $client = new Client;
        $url = $url ?? self::URL;

        $response = $client->request($method, $url, $this->getPayload($message));

        return (string)$response->getBody();
    }

    /**
     * @param array $message
     * @return array
     */
    private function getPayload(array $message): array
    {
        $payload = [
            'json' => $message,
            'query' => [
                'access_token' => $this->pageAccessToken
            ]
        ];

        return $payload;
    }
}