<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\DataAware;
use SplObjectStorage;

class Row extends DataAware implements RowInterface
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