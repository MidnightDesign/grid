<?php

namespace Midnight\Grid\Column;

use Midnight\Grid\AbstractGridElement;
use Midnight\Grid\GridInterface;

class Column extends AbstractGridElement implements ColumnInterface
{
    private $grid;
    private $name;

    function __construct($name, $attributes = array())
    {
        $this->name = $name;
        $this->setAttributes($attributes);
    }

    public function setGrid(GridInterface $grid)
    {
        $this->grid = $grid;
    }

    public function getName()
    {
        return $this->name;
    }
}