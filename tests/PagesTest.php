<?php
namespace R64\PhpNotion\Tests;

use R64\PhpNotion\Resources\Types\Page;
use R64\PhpNotion\Tests\mocks\PageResponse;

class PagesTest extends TestCase
{

    /** @test */
    public function it_can_get_a_page()
    {
        $notion = $this->getMockClient(200, (new PageResponse)->single());
        $page = $notion->pages()->retrieve('c4d26137149044879bc5a041a6358f9f');

        $this->assertInstanceOf(Page::class, $page);
        $this->assertEquals($page->getId(), 'c4d26137-1490-4487-9bc5-a041a6358f9f');
        $this->assertEquals($page->getObject(), 'page');
        $this->assertEquals($page->getCreatedTime(), '2021-05-14T13:17:47.471Z');
        $this->assertEquals($page->getLastEditedTime(), '2021-05-14T13:53:00.000Z');
        $this->assertEquals($page->getArchived(), false);
    }

    /** @test */
    public function it_can_create_a_page()
    {
        $notion = $this->getMockClient(200, (new PageResponse())->created());

        $payload = [
            "parent" => [
                "database_id" => "4eb895ed2227406f80bcd4565f304cf4",
            ],
            "properties" => [
                "Name" => [
                    "title" => [
                        [
                            "text" => [
                                "content" => "Test Sample Page Header",
                            ],
                        ],
                    ],
                ],
            ],
            "children" => [
                [
                    "object" => "block",
                    "type" => "heading_2",
                    "heading_2" => [
                        "text" => [
                            [
                                "type" => "text",
                                "text" => [
                                    "content" => "Lacinato kale",
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    "object" => "block",
                    "type" => "paragraph",
                    "paragraph" => [
                        "text" => [
                            [
                                "type" => "text",
                                "text" => [
                                    "content" => "Lacinato kale is a variety of kale with a long tradition in Italian cuisine, especially that of Tuscany. It is also known as Tuscan kale, Italian kale, dinosaur kale, kale, flat back kale, palm tree kale, or black Tuscan palm.",
                                    "link" => [
                                        "url" => "https://en.wikipedia.org/wiki/Lacinato_kale",
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $response = $notion->pages()->create($payload);

        $this->assertInstanceOf(Page::class, $response);
    }

    /** @test */
    public function it_can_update_a_page()
    {
        $notion = $this->getMockClient(200, (new PageResponse())->single());

        $response = $notion->pages()->update('7d9623b8-5692-4379-b2cb-c9d566103e67', [
            "properties" => [
                "Name" => [
                    "title" => [
                        [
                            "text" => [
                                "content" => "Sample Page Header",
                            ],
                        ],
                    ],
                ],
            ],
        ]);

        $this->assertInstanceOf(Page::class, $response);
    }
}
