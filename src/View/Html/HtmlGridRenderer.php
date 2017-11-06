<?php declare(strict_types=1);

namespace Midnight\Grid\View\Html;

use Midnight\Grid\{
    ColumnInterface, GridInterface, RowInterface, View\CellRendererInterface, View\ColumnHeadRendererInterface, View\GridRendererInterface, View\KeyColumnHeadRenderer, View\StringCastCellRenderer
};

final class HtmlGridRenderer implements GridRendererInterface
{
    /** @var CellRendererInterface */
    private $cellRenderer;
    /** @var ColumnHeadRendererInterface */
    private $headRenderer;

    public function __construct(CellRendererInterface $cellRenderer = null, ColumnHeadRendererInterface $headRenderer = null) {
        $this->cellRenderer = $cellRenderer ?? new TdCellRenderer(new StringCastCellRenderer());
        $this->headRenderer = $headRenderer ?? new KeyColumnHeadRenderer();
    }

    public function render(GridInterface $grid): string
    {
        $html = "<table>{$this->thead($grid)}{$this->tbody($grid)}";
        if (count($grid->getFooterRows()) > 0) {
            $html .= $this->tfoot($grid);
        }
        $html .= '</table>';
        return $html;
    }

    private function thead(GridInterface $grid): string
    {
        return "<thead><tr>{$this->headers($grid)}</tr></thead>";
    }

    private function headers(GridInterface $grid): string
    {
        return implode("\n", array_map([$this, 'th'], $grid->getColumns()));
    }

    private function th(ColumnInterface $column): string
    {
        return "<th>{$this->headRenderer->render($column)}}</th>";
    }

    private function tbody(GridInterface $grid): string
    {
        return "<tbody>{$this->rows($grid)}</tbody>";
    }

    private function rows(GridInterface $grid): string
    {
        return implode("\n", array_map(function (RowInterface $row) use ($grid) {
            return $this->tr($row, $grid->getColumns());
        }, $grid->getRows()));
    }

    private function tfoot(GridInterface $grid): string
    {
        return "<tfoot>{$this->footerRows($grid)}</tfoot>";
    }

    private function footerRows(GridInterface $grid): string
    {
        return implode("\n", array_map(function (RowInterface $row) use ($grid) {
            return $this->tr($row, $grid->getColumns());
        }, $grid->getFooterRows()));
    }

    private function tr(RowInterface $row, array $columns)
    {
        return "<tr>{$this->cells($row, $columns)}</tr>";
    }

    private function cells(RowInterface $row, array $columns): string
    {
        return implode("\n", array_map(function (ColumnInterface $column) use ($row) {
            return $this->cellRenderer->render($row->getCell($column), $column);
        }, $columns));
    }
}
