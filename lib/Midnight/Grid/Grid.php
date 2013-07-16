<?php

namespace Midnight\Grid;

use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\Row\RowInterface;

class Grid implements GridInterface
{

    /**
     * @var \SplDoublyLinkedList
     */
    private $rows;
    /**
     * @var \SplDoublyLinkedList
     */
    private $columns;

    function __construct()
    {
        $this->rows = new \SplDoublyLinkedList();
        $this->columns = new \SplDoublyLinkedList();
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function addRow(RowInterface $row)
    {
        $this->getRows()->push($row);
        $row->setGrid($this);
    }

    public function setColumn(ColumnInterface $column)
    {
        $this->columns->push($column);
        $column->setGrid($this);
    }

    /**
     * @return ColumnInterface[]|\SplDoublyLinkedList
     */
    public function getColumns()
    {
        return $this->columns;
    }

    public function addColumn(ColumnInterface $column)
    {
        $this->getColumns()->push($column);
    }
}