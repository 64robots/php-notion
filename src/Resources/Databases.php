<?php

declare(strict_types=1);

namespace R64\PhpNotion\Resources;

use R64\PhpNotion\Resources\Types\Database;

class Databases extends ApiResource
{
    public function retrieve(string $databaseId): Database
    {
        $response = $this->notionClient->getResource('databases', $databaseId);

        return new Database(
            $response->object,
            $response->id,
            $response->created_time,
            $response->last_edited_time,
            $response->title,
            $response->properties
        );
    }
}
