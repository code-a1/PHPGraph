<?php


namespace codea1\PHPGraph;

use codea1\Telegraph;
use skrtdev\JSON2\Exception;

trait Methods
{

    /**
     * This method allow you to create a new Telegraph account.
     * Is required only the short_name, but you can also give others arguments with an array.
     *
     * @param string $short_name
     * @param array|null $args
     * @return Telegraph\Account
     * @throws Exception
     */
    public function createAccount(string $short_name, array $args = null): Telegraph\Account
    {
        $data = [
          "short_name" => $short_name,
        ] + ($args ?? []);

        return json2_decode($this->request("createAccount", $data), Telegraph\Account::class, client : $this);
    }

    /**
     * This method allow you to create a new page.
     * The title and the content are required (as the content you can use an array of nodes or a string), but you can also give others arguments with an array.
     *
     * @param string $title
     * @param array|string $content
     * @param array $args
     * @return Telegraph\Page
     * @throws Exception
     */
    public function createPage(string $title, array|string $content, array $args = []): Telegraph\Page
    {

        $content = (is_string($content)) ? [["tag"=>"p","children" => [$content]]] : $content;

        $args["autor_name"] ??= $this->autor_name ?? [];

        $data = [
                "title" => $title,
                "content" => json_encode($content)
            ] + ($args ?? ["author_name" => $this->author_name]);

        $data["access_token"] ??= $this->access_token;

        return json2_decode($this->request("createPage", $data), Telegraph\Page::class, client : $this);
    }

    /**
     * This method allow you to edit the information about an Account.
     * To specify what you want to change about the account you can use an array.
     *
     * @param array|null $args
     * @return Telegraph\Account
     * @throws Exception
     */

    public function editAccountInfo(?array $args): Telegraph\Account
    {

        $args["access_token"] ??= $this->access_token;

        return json2_decode($this->request("editAccountInfo", $args), Telegraph\Account::class, client : $this);
    }


    /**
     * This method allow you to get specifics information about an account.
     * Is required only a list of the fields that you want to get.
     *
     * @param array $fields
     * @return array
     */
    public function getAccountInfo(array $fields): array
    {
        $data = [
                "fields" => json_encode($fields)
            ];

        $data["access_token"] ??= $this->access_token;

        return $this->request("getAccountInfo", $data);
    }

    /**
     * This method allow you to edit an existent page.
     * Returns a Page object on success.
     *
     * @param string $path
     * @param string $title
     * @param array|string $content
     * @param array $args
     * @return Telegraph\Page
     */
    public function editPage(string $path, string $title, array|string $content, array $args = []): Telegraph\Page
    {
        $content = (is_string($content)) ? [["tag"=>"p","children" => [$content]]] : $content;

        $data = [
                "path" => $path,
                "title" => $title,
                "content" => json_encode($content)
            ] + ($args);

        $data["access_token"] ??= $this->access_token;

        return json2_decode($this->request("editPage", $data), Telegraph\Page::class, client : $this);
    }

    /**
     * Use this method to get a Telegraph page.
     * Returns a Page object on success.
     *
     * @param string $path
     * @param array $args
     * @return Telegraph\Page
     * @throws Exception
     */
    public function getPage(string $path, array $args = []): Telegraph\Page
    {
        $data = [
            "path" => $path,
        ]+ ($args);

        return json2_decode($this->request("getPage", $data), Telegraph\Page::class, client : $this);
    }

    /**
     * Use this method to get a list of the pages belonging to a Telegraph account.
     * Returns a PageList object, sorted by most recently created pages first.
     *
     * @param array $args
     * @return Telegraph\PageList
     * @throws Exception
     */
    public function getPageList(array $args = []): Telegraph\PageList
    {
        $args["access_token"] ??= $this->access_token;

        return json2_decode($this->request("getPageList", $args), Telegraph\PageList::class, client : $this);
    }

    /**
     * Use this method to get the number of views for a Telegraph article.
     * Returns a PageViews object on success.
     *
     * @param string $path
     * @param array $args
     * @return Telegraph\PageViews
     * @throws Exception
     */
    public function getViews(string $path, array $args = []): Telegraph\PageViews
    {

        $data = ["path" => $path,] + ($args);

        $data["access_token"] ??= $this->access_token;

        return json2_decode($this->request("getViews", $data), Telegraph\PageViews::class, client : $this);
    }

    /**
     * Use this method to revoke access_token and generate a new one.
     * Returns an Account object on success.
     *
     * @param string|null $access_token
     * @return Telegraph\Account
     * @throws Exception
     */
    public function revokeAccessToken(string $access_token = null): Telegraph\Account
    {
        $access_token ??= $this->access_token;

        $data = ["path" => $access_token,];

        return json2_decode($this->request("revokeAccessToken", $data), Telegraph\Account::class, client : $this);
    }
}