<?php

namespace R64\PhpNotion;

use R64\PhpNotion\Client\NotionClient;
use R64\PhpNotion\Resources\Databases;
use R64\PhpNotion\Resources\Pages;

class Notion
{
    const NOTION_API_BASE_URI = 'https://api.notion.com';
    const DEFAULT_TIMEOUT_SECONDS = 30;

    protected NotionClient $notionClient;

    private Databases $databases;

    private Pages $pages;

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
        /**
         * @psalm-suppress RedundantPropertyInitializationCheck
         */
        if (! isset($this->databases)) {
            $this->databases = new Databases($this->notionClient);
        }

        return $this->databases;
    }

    public function pages(): Pages
    {
        /**
         * @psalm-suppress RedundantPropertyInitializationCheck
         */
        if (! isset($this->pages)) {
            $this->pages = new Pages($this->notionClient);
        }

        return $this->pages;
    }
}
