<?php

namespace R64\PhpNotion\Tests\mocks;

class DatabaseResponse
{
    public function get()
    {
        return json_encode(
            [
                'object' => 'database',
                'id' => 'd65a5216-46ba-479a-961f-67bb7a05f56c',
                'created_time' => '2021-05-14T05:59:02.789Z',
                'last_edited_time' => '2021-05-14T09:19:00.000Z',
                'title' => [
                    [
                        'type' => 'text',
                        'text' => [
                            'content' => 'My test DB',
                            'link' => null,
                        ],
                        'annotations' => [
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
                'properties' => [
                    'Fecha idea' => [
                        'id' => 'OpNM',
                        'type' => 'date',
                        'date' => [],
                    ],
                    'Tags' => [
                        'id' => 'S]lL',
                        'type' => 'multi_select',
                        'multi_select' => [
                            'options' => [
                                [
                                    'id' => '228559e9-0156-4dfe-94e4-82a6fc188a17',
                                    'name' => 'WordPress',
                                    'color' => 'blue',
                                ],
                            ],
                        ],
                    ],
                    'Creador' => [
                        'id' => 'WX]y',
                        'type' => 'people',
                        'people' => [],
                    ],
                    'Idea' => [
                        'id' => 'title',
                        'type' => 'title',
                        'title' => [],
                    ],
                ],
            ]
        );
    }

    public function __invoke()
    {
        return $this->get();
    }
}
