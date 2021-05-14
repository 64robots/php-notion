<?php

namespace R64\PhpNotion\Tests;

use R64\PhpNotion\Exceptions\NotionResourceException;
use R64\PhpNotion\Resources\Database;
use R64\PhpNotion\Tests\mocks\DatabaseResponse;

class DatabasesTest extends TestCase
{
    /** @test */
    public function it_can_retrieve_a_database()
    {
        $notion = $this->getMockClient(200, $this->getDatabaseJson());

        $database = $notion->databases()->retrieve('d65a5216-46ba-479a-961f-67bb7a05f56c');
        $this->assertInstanceOf(Database::class, $database);
        $this->assertSame('database', $database->object());
        $this->assertSame('d65a5216-46ba-479a-961f-67bb7a05f56c', $database->id());
        $this->assertSame('2021-05-14T05:59:02.789Z', $database->createdTime());
        $this->assertSame('2021-05-14T09:19:00.000Z', $database->lastEditedTime());
        $this->assertIsArray($database->title());
        $this->assertIsObject($database->properties());
    }

    /** @test */
    public function it_should_throw_an_exception_on_failure()
    {
        $this->expectException(NotionResourceException::class);

        $notion = $this->getMockClient(400, '{}');

        $notion->databases()->retrieve('d65a5216-46ba-479a-961f-67bb7a05f56c');
    }

    private function getDatabaseJson(): string
    {
        return (new DatabaseResponse)->get();
    }
}
