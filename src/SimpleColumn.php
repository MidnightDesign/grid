<?php

namespace Midnight\Grid;

class SimpleColumn implements ColumnInterface
{
    /** @var string */
    private $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getKey():string
    {
        return $this->key;
    }
}
