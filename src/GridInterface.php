<?php

namespace Midnight\Grid;

interface GridInterface
{
    /**
     * @return RowInterface[]
     */
    public function getRows():array;

    /**
     * @return ColumnInterface[]
     */
    public function getColumns():array;
}
