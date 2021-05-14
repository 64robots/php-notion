<?php

namespace R64\PhpNotion\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use R64\PhpNotion\Client\NotionClient;
use R64\PhpNotion\Notion;
use R64\PhpNotion\Resources\Database;

class DatabasesTest extends TestCase
{
    private function getNotion(string $jsonBody): Notion
    {
        return new class($jsonBody) extends Notion {
            public function __construct(string $jsonBody)
            {
                $mock = new MockHandler([
                    new Response(200, [], $jsonBody),
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

    /** @test */
    public function it_can_retrieve_a_database()
    {
        $notion = $this->getNotion($this->getDatabaseJson());

        $database = $notion->databases()->retrieve('d65a5216-46ba-479a-961f-67bb7a05f56c');
        $this->assertInstanceOf(Database::class, $database);
        $this->assertSame('database', $database->object());
        $this->assertSame('d65a5216-46ba-479a-961f-67bb7a05f56c', $database->id());
        $this->assertSame('2021-05-14T05:59:02.789Z', $database->createdTime());
        $this->assertSame('2021-05-14T09:19:00.000Z', $database->lastEditedTime());
        $this->assertIsArray($database->title());
        $this->assertIsObject($database->properties());
    }

    private function getDatabaseJson(): string
    {
        return json_encode(
            [
                'object' => 'database',
                'id' => 'd65a5216-46ba-479a-961f-67bb7a05f56c',
                'created_time' => '2021-05-14T05:59:02.789Z',
                'last_edited_time' => '2021-05-14T09:19:00.000Z',
                'title' =>
                    [
                        [
                            'type' => 'text',
                            'text' =>
                                [
                                    'content' => 'My test DB',
                                    'link' => null,
                                ],
                            'annotations' =>
                                [
                                    'bold' => false,
                                    'italic' => false,
                                    'strikethrough' => false,
                                    'underline' => false,
                                    'code' => false,
                                    'color' => 'default',
                                ],
                            'plain_text' => 'My test DB',
                            'href' => null,
                        ],
                    ],
                'properties' =>
                    [
                        'Fecha idea' =>
                            [
                                'id' => 'OpNM',
                                'type' => 'date',
                                'date' =>
                                    [],
                            ],
                        'Tags' =>
                            [
                                'id' => 'S]lL',
                                'type' => 'multi_select',
                                'multi_select' =>
                                    [
                                        'options' =>
                                            [
                                                [
                                                    'id' => '228559e9-0156-4dfe-94e4-82a6fc188a17',
                                                    'name' => 'WordPress',
                                                    'color' => 'blue',
                                                ],
                                            ],
                                    ],
                            ],
                        'Creador' =>
                            [
                                'id' => 'WX]y',
                                'type' => 'people',
                                'people' =>
                                    [],
                            ],
                        'Idea' =>
                            [
                                'id' => 'title',
                                'type' => 'title',
                                'title' =>
                                    [],
                            ],
                    ],
            ]
        );
    }
}
