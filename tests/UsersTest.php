<?php
namespace R64\PhpNotion\Tests;

use R64\PhpNotion\Resources\Types\NotionUser;
use R64\PhpNotion\Tests\mocks\UsersResponse;

class UsersTest extends TestCase
{
    /** @test */
    public function it_can_list_users()
    {
        $results = $this->getMockClient(200, (new UsersResponse())->list())->users()->list();
        $this->assertInstanceOf(NotionUser::class, $results['users'][0]);
        $this->assertIsArray($results);
    }

    /** @test */
    public function can_get_user()
    {
        $notion = $this->getMockClient(200, (new UsersResponse)->single());

        $user = $notion->users()->retrieve("4d29001b-6f25-4fec-91ff-05d1fe1a66ec");

        $this->assertInstanceOf(NotionUser::class, $user);

        $this->assertEquals($user->getName(), 'Nuxt Module');
        $this->assertEquals($user->getType(), 'bot');
    }
}
