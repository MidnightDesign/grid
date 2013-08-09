<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Cell\CellInterface;

interface RowInterface
{
    /**
     * @return CellInterface[]
     */
    public function getCells();
}