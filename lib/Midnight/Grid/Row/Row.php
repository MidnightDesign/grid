<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Column\ColumnInterface;
use SplObjectStorage;

class Row implements RowInterface
{
    /**
     * @var SplObjectStorage
     */
    private $cells;

    function __construct()
    {
        $this->cells = new SplObjectStorage();
    }

    public function setCell(ColumnInterface $column, CellInterface $cell)
    {
        $this->cells->attach($column, $cell);
    }

    public function getCell(ColumnInterface $column)
    {
        return $this->cells->offsetGet($column);
    }
}