<?php

namespace Midnight\Grid\Cell;

use Midnight\Grid\DataInterface;

interface CellInterface extends DataInterface
{
    /**
     * @return mixed
     */
    public function getValue();
}