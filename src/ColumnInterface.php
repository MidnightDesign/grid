<?php declare(strict_types = 1);

namespace Midnight\Grid;

interface ColumnInterface
{
    public function getKey():string;

    public function getLabel():string;
}
