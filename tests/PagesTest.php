<?php
namespace R64\PhpNotion\Tests;

use R64\PhpNotion\Notion;
use R64\PhpNotion\Resources\Types\Page;
use R64\PhpNotion\Tests\mocks\PageResponse;

class PagesTest extends TestCase
{

    /** @test */
    public function it_can_get_a_page()
    {
        $notion = $this->getMockClient(200, (new PageResponse)->single());
        $page = $notion->pages()->retrieve('c4d26137149044879bc5a041a6358f9f');

        $this->assertInstanceOf(Page::class, $page);
        $this->assertEquals($page->getId(), 'c4d26137-1490-4487-9bc5-a041a6358f9f');
        $this->assertEquals($page->getObject(), 'page');
        $this->assertEquals($page->getCreatedTime(), '2021-05-14T13:17:47.471Z');
        $this->assertEquals($page->getLastEditedTime(), '2021-05-14T13:53:00.000Z');
        $this->assertEquals($page->getArchived(), false);
    }

    /** @test */
    public function it_can_list_pages()
    {
        $notion = new Notion('secret_qi3932N6ZDwp8FjxCAOhZEDyKua57jNqRoIdZNpluGm');

        $notion->pages()->create();
    }
}
