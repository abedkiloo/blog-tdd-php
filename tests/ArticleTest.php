<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;

    public function testTitleIsEmptyByDefault()
    {
        $this->assertEmpty($this->article->title);
    }

    public function testSlugIsEmptyWithNoTitle()
    {
        $this->assertSame($this->article->getSlug(), "");
    }

    public function testSlugHasSpaceReplacedUnderscores()
    {
        $this->article->title = "An example article";
        $this->assertEquals($this->article->getSlug(), 'An_example_article');
    }

    protected function setUp(): void
    {
        $this->article = new App\Article;
    }
}