<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\GridInterface;

interface RowInterface {

    public function setGrid(GridInterface $grid);

    public function getCells();
}