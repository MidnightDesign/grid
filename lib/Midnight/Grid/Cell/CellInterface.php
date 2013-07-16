<?php

namespace Midnight\Grid\Cell;

use Midnight\Grid\Row\RowInterface;

interface CellInterface
{

    public function setRow(RowInterface $row);

    public function getValue();
}