<?php
declare(strict_types=1);

namespace R64\PhpNotion\Resources;

use R64\PhpNotion\Resources\Types\NotionUser;

class Users extends ApiResource
{
    public function list(): array
    {
        $response = $this->notionClient->getResource("users");

        $mapped = array_map(fn($notionUser) => $this->mapUser($notionUser) ,$response->results);

       return [
           'users' => $mapped,
           'next' => $response->next_cursor,
           'hasMore' => $response->has_more
       ];
    }

    public function retrieve(string $userId): NotionUser
    {
        $response = $this->notionClient->getResource('users', $userId);

        return $this->mapUser($response);
    }

    private function mapUser($user): NotionUser
    {
        return new NotionUser(
            $user->object,
            $user->id,
            $user->name,
            $user->avatar_url,
            $user->type,
            $this->getUserTypeObject($user)
        );
    }

    private function getUserTypeObject($user)
    {
        if ($user->type === 'bot') {
            return $user->bot;
        }

        return $user->person;
    }
}
