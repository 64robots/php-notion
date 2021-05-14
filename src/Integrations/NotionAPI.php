<?php

namespace R64\PhpNotion\Integrations;

class NotionAPI
{
    public function __construct()
    {
        $this->client = new Guzzle();
    }
}
