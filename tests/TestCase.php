<?php

namespace R64\PhpNotion\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as BaseTestCase;
use R64\PhpNotion\Client\NotionClient;
use R64\PhpNotion\Notion;

class TestCase extends BaseTestCase
{
    protected function getMockClient(int $status, string $jsonBody): Notion
    {
        return new class($status, $jsonBody) extends Notion {
            public function __construct(int $status, string $jsonBody)
            {
                $mock = new MockHandler([
                    new Response($status, [], $jsonBody),
                ]);

                $handlerStack = HandlerStack::create($mock);
                $mockedClient = new Client(['handler' => $handlerStack]);

                $this->notionClient = new NotionClient(
                    'https://api.notion.com',
                    'access-token',
                    30,
                    $mockedClient
                );
            }
        };
    }
}
