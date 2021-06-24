<?php


namespace codea1\Telegraph;


class Account
{

    /**
     * Access token of the Telegraph account.
     * @var string|null
     */
    public ?string $access_token;
    /**
     * Default author name used when creating new articles.
     * @var string|null
     */
    public ?string $author_name;

    /**
     * Account name, helps users with several accounts remember which they are currently using. Displayed to the user above the "Edit/Publish" button on Telegra.ph, other users don't see this name.
     * @var string
     */
    public string $short_name;

    /**
     * Profile link, opened when users click on the author's name below the title. Can be any link, not necessarily to a Telegram profile or channel.
     * @var string|null
     */
    public ?string $author_url;

    /**
     * URL to authorize a browser on telegra.ph and connect it to a Telegraph account. This URL is valid for only one use and for 5 minutes only.
     * @var string|null
     */
    public ?string $auth_url;

    /**
     * Number of pages belonging to the Telegraph account.
     * @var int|null
     */
    public ?int $page_count;

}