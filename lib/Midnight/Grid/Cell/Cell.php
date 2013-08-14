<?php

namespace Midnight\Grid\Cell;

class Cell implements CellInterface
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