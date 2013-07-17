<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\GridInterface;

interface RowInterface
{

    /**
     * @param GridInterface $grid
     * @return mixed
     */
    public function setGrid(GridInterface $grid);

    /**
     * @return GridInterface
     */
    public function getGrid();

    /**
     * @return \SplObjectStorage|CellInterface[]
     */
    public function getCells();
}