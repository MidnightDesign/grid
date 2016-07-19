<?php declare(strict_types = 1);

namespace Midnight\Grid;

interface RowInterface
{
    public function getCell(ColumnInterface $column):CellInterface;
}
