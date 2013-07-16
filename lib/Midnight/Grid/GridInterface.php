<?php

namespace Midnight\Grid;

use Midnight\Grid\Column\ColumnInterface;

interface GridInterface
{
    /**
     * @return ColumnInterface[]|\SplDoublyLinkedList
     */
    public function getColumns();

    public function getRows();
}