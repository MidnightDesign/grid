<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\DataInterface;

interface RowInterface extends DataInterface
{
    public function getCell(ColumnInterface $column);
}