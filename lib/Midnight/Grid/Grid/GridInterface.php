<?php

namespace Midnight\Grid\Grid;

use Midnight\Grid\Row\RowInterface;

interface GridInterface
{
    /**
     * @return RowInterface[]
     */
    public function getRows();
}