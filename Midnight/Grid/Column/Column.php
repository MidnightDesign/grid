<?php

namespace Midnight\Grid\Column;

use Midnight\Grid\GridInterface;

class Column implements ColumnInterface
{
    private $grid;
    private $name;

    function __construct($name)
    {
        $this->name = $name;
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