<?php declare(strict_types=1);

namespace Midnight\Grid\View\Html;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;
use Midnight\Grid\View\CellRendererInterface;

class TdCellRenderer implements CellRendererInterface
{
    /** @var CellRendererInterface */
    private $cellRenderer;

    public function __construct(CellRendererInterface $cellRenderer)
    {
        $this->cellRenderer = $cellRenderer;
    }

    public function render(CellInterface $cell, ColumnInterface $column): string
    {
        return "<td>{$this->cellRenderer->render($cell, $column)}</td>";
    }
}
