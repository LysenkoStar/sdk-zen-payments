<?php

namespace ZenPayments\Http;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use ZenPayments\Contract\TransactionInterface;
use ZenPayments\Validation\RequestValidator;

class ZenClient
{
    private HttpClient $httpClient;
    private string $apiKey;
    private string $apiBase;

    public function __construct(string $requestId = '')
    {
        $this->apiBase = getenv('ZENPAYMENTS_API_BASE');
        $this->apiKey = getenv('ZENPAYMENTS_API_KEY');

        $this->httpClient = new HttpClient([
            'base_uri' => $this->apiBase,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
                'request-id'    => $requestId
            ],
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function execute(TransactionInterface $transaction): array
    {
        RequestValidator::validate($transaction);

        $response = $this->httpClient->request(
            $transaction->getMethod(),
            $transaction->getUri(),
            ['json' => $transaction->getRequestData()]
        );

        return json_decode($response->getBody()->getContents(), true);

    }

}