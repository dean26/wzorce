<?php 

/**
 * Factory is an object for creating other objects.
 * There is a simple implementation, BlogPost and News.
 */


interface Article
{
    public function getHeader();
    public function getBody();
    public function getFooter();
}

/**
 * News
 */
class News implements Article
{
    public function getHeader(): string
    {
        return '<h1>News title</h1>';
    }

    public function getBody(): string
    {
        return '<p>News body</p>';
    }

    public function getFooter(): string
    {
        return '<small>News footer</small>';
    }
}

/**
 * BlogPost
 */
class BlogPost implements Article
{
    public function getHeader(): string
    {
        return '<h1>Blog post title</h1>';
    }

    public function getBody(): string
    {
        return '<p>Blog post body</p>';
    }

    public function getFooter(): string
    {
        return '<small>Blog post footer</small>';
    }
}

/**
 * Factory
 */
abstract class Factory
{
    public abstract function getArticle();
}


/**
 * ArticleFactory
 */
final class ArticleFactory extends Factory
{
    protected string $mode;

    public function __construct(string $mode)
    {
        $this->mode = $mode;
    }

    public function getArticle() : Article
    {
        switch($this->mode){
            case 'news':
                return new News();
                break;
            default:
                return new BlogPost();
        }
    }
}


/**
 * ArticleShow class to get article
 */
final class ArticleShow
{
    private Factory $factory;

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    public function getFullBody() : string
    {
        $article = $this->factory->getArticle();
        return $article->getHeader() . ' ' . $article->getBody() . ' ' . $article->getFooter();
    }
}


$article = new ArticleShow(new ArticleFactory('news'));
echo $article->getFullBody();
