<?php

namespace R64\PhpNotion;

use R64\PhpNotion\Client\NotionClient;
use R64\PhpNotion\Resources\Databases;

class Notion
{
    const NOTION_API_BASE_URI = 'https://api.notion.com';
    const DEFAULT_TIMEOUT_SECONDS = 30;

    protected NotionClient $notionClient;
    private Databases $databases;

    public function __construct(string $accessToken)
    {
        $this->notionClient = new NotionClient(
            self::NOTION_API_BASE_URI,
            $accessToken,
            self::DEFAULT_TIMEOUT_SECONDS
        );
    }

    public function databases(): Databases
    {
        if (! isset($this->databases)) {
            $this->databases = new Databases($this->notionClient);
        }

        return $this->databases;
    }
}
