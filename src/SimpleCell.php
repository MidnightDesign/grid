<?php

namespace Midnight\Grid;

class SimpleCell implements CellInterface
{
    /** @var mixed */
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
