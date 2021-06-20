<?php
namespace R64\PhpNotion\Resources;

use R64\PhpNotion\Client\NotionClient;

abstract class ApiResource
{
    protected NotionClient $notionClient;

    public function __construct(NotionClient $notionClient)
    {
        $this->notionClient = $notionClient;
    }
}
