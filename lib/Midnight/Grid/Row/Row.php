<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\AbstractGridElement;
use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\GridInterface;

class Row extends AbstractGridElement implements RowInterface
{

    /**
     * @var GridInterface
     */
    private $grid;

    /**
     * @var \SplObjectStorage
     */
    private $cells;

    function __construct($attributes = array())
    {
        $this->cells = new \SplObjectStorage();
        $this->setAttributes($attributes);
    }

    public function setGrid(GridInterface $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @param CellInterface $cell
     * @param ColumnInterface $column
     */
    public function setCell(CellInterface $cell, ColumnInterface $column)
    {
        $this->getCells()->attach($column, $cell);
        $cell->setRow($this);
    }

    /**
     * @return \Midnight\Grid\GridInterface
     */
    public function getGrid()
    {
        return $this->grid;
    }

    public function getCells()
    {
        return $this->cells;
    }

}