<?php
namespace R64\PhpNotion\Tests\mocks;

class UsersResponse
{
    public function list()
    {
        return json_encode([
                "object" => "list",
                "results" => [
                    [
                        "object" => "user",
                        "id" => "47b47f77-4745-4133-b9d7-8adc2375f262",
                        "name" => "Rob Preston",
                        "avatar_url" => "https://s3-us-west-2.amazonaws.com/public.notion-static.com/cf5eb1cd-d9b2-448c-9688-8c27f0a69dc5/22339095_10101953299563963_3353940092955021241_o.jpg",
                        "type" => "person",
                        "person" => [
                            "email" => "rob@64robots.com"
                        ]
                    ],
                    [
                        "object" => "user",
                        "id" => "4d29001b-6f25-4fec-91ff-05d1fe1a66ec",
                        "name" => "Nuxt Module",
                        "avatar_url" => null,
                        "type" => "bot",
                        "bot" => '{}'
                    ]
                ],
                "next_cursor" => null,
                "has_more" => false
            ]);
    }

    public function single()
    {
        return json_encode([
                "object" => "user",
                "id" => "4d29001b-6f25-4fec-91ff-05d1fe1a66ec",
                "name" => "Nuxt Module",
                "avatar_url" => null,
                "type" => "bot",
                "bot" => [
                ]
            ]);
    }
}
