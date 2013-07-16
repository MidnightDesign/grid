<?php

namespace Midnight\Grid\Column;

use Midnight\Grid\GridInterface;

interface ColumnInterface
{
    public function setGrid(GridInterface $grid);

    public function getName();
}