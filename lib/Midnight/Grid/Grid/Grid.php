<?php

namespace Midnight\Grid\Grid;

use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\DataAware;
use Midnight\Grid\Row\RowInterface;

/**
 * A really simple GridInterface implementation
 * @package Midnight\Grid\Grid
 */
class Grid extends DataAware implements GridInterface
{
    /**
     * @var RowInterface[]
     */
    public $rows;
    /**
     * @var ColumnInterface[]
     */
    public $columns;

    /**
     * @return RowInterface[]
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param RowInterface $row
     */
    public function addRow(RowInterface $row)
    {
        $this->rows[] = $row;
    }

    /**
     * @return ColumnInterface
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @param ColumnInterface $column
     */
    public function addColumn(ColumnInterface $column)
    {
        $this->columns[] = $column;
    }
}