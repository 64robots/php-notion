<?php
namespace R64\PhpNotion\Tests\mocks;

class PageResponse
{
    public function single()
    {
        return json_encode([
            "object" => "page",
            "id" => "c4d26137-1490-4487-9bc5-a041a6358f9f",
            "created_time" => "2021-05-14T13:17:47.471Z",
            "last_edited_time" => "2021-05-14T13:53:00.000Z",
            "parent" => [
                "type" => "page_id",
                "page_id" => "89361b82-3970-4663-afa8-15cb42b37c94",
            ],
            "archived" => false,
            "properties" => [
                "title" => [
                    "id" => "title",
                    "type" => "title",
                    "title" => [
                        [
                            "type" => "text",
                            "text" => [
                                "content" => "Example page",
                                "link" => null,
                            ],
                            "annotations" => [
                                "bold" => false,
                                "italic" => false,
                                "strikethrough" => false,
                                "underline" => false,
                                "code" => false,
                                "color" => "default",
                            ],
                            "plain_text" => "Example page",
                            "href" => null,
                        ],
                    ],
                ],
            ],
        ]);
    }

    public function created()
    {
        return json_encode([
            "object" => "page",
            "id" => "7d9623b8-5692-4379-b2cb-c9d566103e67",
            "created_time" => "2021-05-15T10:11:07.555Z",
            "last_edited_time" => "2021-05-15T10:11:07.557Z",
            "parent" => [
                "type" => "database_id",
                "database_id" => "4eb895ed-2227-406f-80bc-d4565f304cf4"
            ],
            "archived" => false,
            "properties" => [
                "Name" => [
                    "id" => "title",
                    "type" => "title",
                    "title" => [
                        [
                            "type" => "text",
                            "text" => [
                                "content" => "Tuscan Kale",
                                "link" => null
                            ],
                            "annotations" => [
                                "bold" => false,
                                "italic" => false,
                                "strikethrough" => false,
                                "underline" => false,
                                "code" => false,
                                "color" => "default"
                            ],
                            "plain_text" => "Tuscan Kale",
                            "href" => null
                        ]
                    ]
                ]
            ]
        ]);
    }

}
