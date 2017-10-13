<?php declare(strict_types=1);

namespace Midnight\Grid\View\HtmlRenderer;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;

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
        $data = null !== $cell->getData() ? $this->cellRenderer->render($cell, $column) : '';
        return "<td>{$data}</td>";
    }
}