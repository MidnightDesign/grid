<?php

namespace Midnight\Grid;

interface RowInterface
{
    public function getCell(ColumnInterface $column):CellInterface;
}
