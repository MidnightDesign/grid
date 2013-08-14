<?php

namespace Midnight\Grid\Column;

/**
 * A really simple ColumnInterface implementation
 * @package Midnight\Grid\Column
 */
class Column implements ColumnInterface
{
    /**
     * @var string
     */
    public $label;

    /**
     * @param string $label
     */
    function __construct($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}