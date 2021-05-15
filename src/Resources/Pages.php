<?php

namespace R64\PhpNotion\Resources;

use R64\PhpNotion\Resources\Types\Page;

class Pages extends ApiResource
{
    /**
     * @param string $pageId
     * @return Page
     */
    public function retrieve(string $pageId): Page
    {
        $response = $this->notionClient->getResource('pages', $pageId);

        return  new Page(
            $response->object,
            $response->id,
            $response->created_time,
            $response->last_edited_time,
            $response->properties,
            $response->archived,
            $response->parent
        );
    }

    /**
     * @param array $payload
     * @return Page
     * @throws \R64\PhpNotion\Exceptions\NotionResourceException
     */
    public function create(array $payload): Page
    {
        $response = $this->notionClient->createResource('pages', $payload);

        return  new Page(
            $response->object,
            $response->id,
            $response->created_time,
            $response->last_edited_time,
            $response->properties,
            $response->archived,
            $response->parent
        );
    }

    /**
     * @param string $pageId
     * @param array $payload
     * @return Page
     * @throws \R64\PhpNotion\Exceptions\NotionResourceException
     */
    public function update(string $pageId, array $payload): Page
    {
        $response = $this->notionClient->updateResource('pages', $pageId, $payload);

        return  new Page(
            $response->object,
            $response->id,
            $response->created_time,
            $response->last_edited_time,
            $response->properties,
            $response->archived,
            $response->parent
        );
    }
}
