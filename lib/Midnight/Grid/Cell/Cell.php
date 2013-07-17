<?php

namespace Midnight\Grid\Cell;

use Midnight\Grid\AbstractGridElement;
use Midnight\Grid\Row\RowInterface;

class Cell extends AbstractGridElement implements CellInterface
{

    private $row;
    private $value;

    function __construct($value = null, $attributes = array())
    {
        $this->value = $value;
        $this->setAttributes($attributes);
    }

    public function setRow(RowInterface $row)
    {
        $this->row = $row;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}