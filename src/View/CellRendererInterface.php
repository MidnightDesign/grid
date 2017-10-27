<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;

interface CellRendererInterface
{
    public function render(CellInterface $cell, ColumnInterface $column): string;
}
