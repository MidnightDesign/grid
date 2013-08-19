<?php

namespace Midnight\Grid\Grid;

use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\DataInterface;
use Midnight\Grid\Row\RowInterface;

interface GridInterface extends DataInterface
{
    /**
     * @return RowInterface[]
     */
    public function getRows();

    /**
     * @return ColumnInterface[]
     */
    public function getColumns();
}