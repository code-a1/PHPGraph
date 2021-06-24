<?php


namespace codea1\Telegraph;

use codea1\PHPGraph\Client;
use skrtdev\JSON2\Exception;
use skrtdev\JSON2\JSONProperty;

class Page
{

    /**
     * Content of the page.
     * @var \codea1\Telegraph\Node[]
     */
    public ?array $content;

    /**
     * Path to the Telegraph page.
     * @var string
     */
    public string $path;

    /**
     * Title of the page.
     * @var string
     */
    public string $title;

    /**
     * URL of the page.
     * @var string
     */
    public string $url;

    /**
     * Description of the page.
     * @var string
     */
    public string $description;

    /**
     * Name of the author, displayed below the title.
     * @var string|null
     */
    public ?string $author_name;

    /**
     * Profile link, opened when users click on the author's name below the title.  Can be any link, not necessarily to a Telegram profile or channel.
     * @var string|null
     */
    public ?string $author_url;

    /**
     * Image URL of the page.
     * @var string|null
     */
    public ?string $image_url;

    /**
     * Number of page views for the page.
     * @var int
     */
    public int $views;

    /**
     * True, if the target Telegraph account can edit the page.
     * @var bool|null
     */
    public ?bool $can_edit;

    #[JSONProperty(init_var: 'client')]
    protected Client $client;


    /**
     * This method allow you to edit a page.
     * Returns a Page object on success.
     *
     * @param string|null $title
     * @param array|string|null $content
     * @param array $args
     * @return Page
     * @throws Exception
     */
    public function edit(?string $title, array|string $content = null, array $args = []): Page
    {

        return $this->client->editPage($this->path,
            $title ?? $this->title,
            $content ?? $this->content ?? $this->get(["return_content" => true])->content,
            $args);

    }

    /**
     * Use this method to get a Telegraph page.
     * Returns a Page object on success.
     *
     * @param array|null $args
     * @return Page
     * @throws Exception
     */
    public function get(?array $args = []): Page
    {

        return $this->client->getPage($this->path, $args);

    }

    /**
     * Use this method to get the number of views for a Telegraph article.
     * Returns a PageViews object on success.
     *
     * @param array|null $args
     * @return PageViews
     * @throws Exception
     */
    public function views(?array $args = []): PageViews
    {

        return $this->client->getViews($this->path, $args);

    }
}