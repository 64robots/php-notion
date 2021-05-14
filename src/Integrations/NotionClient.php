<?php

namespace R64\PhpNotion\Integrations;

use GuzzleHttp\Client;

class NotionClient
{
    private Client $client;

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
        $response = $this->client->get("/v1/${resourceType}/${resourceId}");

        return json_decode($response->getBody());
    }
}
