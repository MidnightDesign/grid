<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Column\ColumnInterface;

interface RowInterface
{
    public function getCell(ColumnInterface $column);
}