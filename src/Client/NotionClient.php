<?php

namespace R64\PhpNotion\Client;

use Exception;
use GuzzleHttp\Client;
use R64\PhpNotion\Exceptions\NotionResourceException;

class NotionClient
{
    private Client $client;
    private bool $successful;
    private int $status;

    public function __construct(
        string $baseUri,
        string $accessToken,
        int $timeout,
        ?Client $restClient = null
    ) {
        $this->client = $restClient ?: new Client([
            'base_uri' => $baseUri,
            'timeout' => $timeout,
            'headers' => ['Authorization' => "Bearer {$accessToken}"],
        ]);
    }

    public function getResource(string $resourceType, string $resourceId)
    {
        $response = $this->attemptRequest('get', "/v1/${resourceType}/${resourceId}");

        if ($this->attemptSuccessful()) {
            return $response;
        }

        throw new NotionResourceException($this->getMessage(), $this->statusCode());
    }

    public function attemptRequest(string $method, string $uri, array $params = [], $headers = [])
    {
        try {
            $queryMethods = ['get', 'delete'];

            $requestOptions[] = ['headers' => $headers];
            $requestOptions[] = in_array(strtolower($method), $queryMethods) ? ['query' => $params] : ['json' => $params];

            $response = $this->client->request($method, $uri, $requestOptions);

            $this->successful = $response->getReasonPhrase() === 'OK';
            $this->status = $response->getStatusCode();

            return json_decode($response->getBody());;
        } catch (Exception $exception) {
            $this->recordError($exception);
        }
    }

    public function attemptSuccessful(): bool
    {
        return $this->successful;
    }

    public function statusCode(): int
    {
        return $this->status;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function recordError($e)
    {
        $this->status = $e->getCode();
        $this->successful = false;
        $this->message = $e->getMessage();
    }
}