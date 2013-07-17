<?php

namespace Midnight\Grid\Cell;

class LinkedCell extends Cell
{
    /**
     * @var string
     */
    private $href;

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

}