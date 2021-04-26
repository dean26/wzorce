<?php 

/**
 In decorator we can add new functionalities without changing others objects.
*/

/**
 * Article
 */
class Article{
    
    /**
     * title
     *
     * @var string
     */
    protected string $title;

    /**
     * Get title
     *
     * @return  string
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param  string  $title  title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }
}

class ArticleTitleH1Decorator{
    
    /**
     * article
     *
     * @var Article
     */
    private Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getTitle(){
        return '<h1>'.$this->article->getTitle().'</h1>';
    }

}

$article = new Article();
$article->setTitle("Lorem ipsum");
echo $article->getTitle();

$decorator = new ArticleTitleH1Decorator($article);
echo $decorator->getTitle();

 