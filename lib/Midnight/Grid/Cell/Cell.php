<?php

namespace Midnight\Grid\Cell;

use Midnight\Grid\DataAware;

class Cell extends DataAware implements CellInterface
{
    /**
     * @var mixed
     */
    public $value;

    /**
     * @param $value
     */
    function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
}