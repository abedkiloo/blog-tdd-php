<?php

use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase
{
    protected $article;


    static function titleProvider()
    {
        return [
            "Slug has Space Removed" => ["An example article", "An_example_article"],
            "White space remove" => [" An example article ", "An_example_article"],
            "Unwanted Characters" => ["Read! This! Now!", "Read_This_Now"]
        ];
    }

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

    public function testSlugDoesNotStartOREndWithUnderScore()
    {
        $this->article->title = " An example article ";
        $this->assertEquals($this->article->getSlug(), 'An_example_article');

    }

    /**
     * @dataProvider titleProvider
     * @param $title
     * @param $slug
     * @return void
     */
    public function testSlugDoesNotHaveAnyNoneWordCharacters($title, $slug)
    {
        $this->article->title = $title;
        $this->assertEquals($this->article->getSlug(), $slug);
    }

    protected function setUp(): void
    {
        $this->article = new App\Article;
    }
}