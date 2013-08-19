<?php

namespace Midnight\Grid\Column;

use Midnight\Grid\DataInterface;

interface ColumnInterface extends DataInterface
{
    /**
     * @return string
     */
    public function getLabel();
}