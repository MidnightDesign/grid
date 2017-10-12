<?php declare(strict_types=1);

namespace Midnight\Grid\View\HtmlRenderer;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;

class SimpleCellRenderer implements CellRendererInterface
{
    public function render(CellInterface $cell, ColumnInterface $column): string
    {
        return (string)$cell->getData();
    }
}
