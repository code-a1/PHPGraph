<?php


namespace codea1\Telegraph;


class PageList
{

    /**
     * Requested pages of the target Telegraph account.
     * @var Page[]
     */
    public array $pages;

    /**
     * Total number of pages belonging to the target Telegraph account.
     * @var int
     */
    public int $total_count;
}