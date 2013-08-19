<?php

namespace Midnight\Grid\Column;
use Midnight\Grid\DataAware;

/**
 * A really simple ColumnInterface implementation
 * @package Midnight\Grid\Column
 */
class Column extends DataAware implements ColumnInterface
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