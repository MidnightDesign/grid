<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\{
    CellInterface, ColumnInterface, GridInterface, RowInterface
};

final class HtmlRenderer implements GridRendererInterface
{
    public function render(GridInterface $grid): string
    {
        return "<table>{$this->thead($grid)}{$this->tbody($grid)}{$this->tfoot($grid)}</table>";
    }

    private function thead(GridInterface $grid): string
    {
        return "<thead><tr>{$this->headers($grid)}</tr></thead>";
    }

    private function headers(GridInterface $grid): string
    {
        return implode("\n", array_map([$this, 'th'], $grid->getColumns()));
    }

    private function tfoot(GridInterface $grid): string
    {
        return "<tfoot><tr>{$this->footers($grid)}</tr></tfoot>";
    }

    private function footers(GridInterface $grid): string
    {
        $row = $grid->getFooterRow();
        return implode("\n", array_map(function (ColumnInterface $column) use ($row) {
            return $this->td($row->getCell($column));
        }, $grid->getColumns()));
    }

    private function th(ColumnInterface $column): string
    {
        return "<th>{$column->getKey()}</th>";
    }

    private function td(CellInterface $cell) {
        return "<td>{$cell->getData()}</td>";
    }

    private function tbody(GridInterface $grid): string
    {
        return "<tbody>{$this->rows($grid)}</tbody>";
    }

    private function rows(GridInterface $grid): string
    {
        return implode("\n", array_map(function (RowInterface $row) use ($grid) {
            return "<tr>{$this->cells($row, $grid->getColumns())}</tr>";
        }, $grid->getRows()));
    }

    private function cells(RowInterface $row, array $columns): string
    {
        return implode("\n", array_map(function (ColumnInterface $column) use ($row) {
            return $this->td($row->getCell($column));
        }, $columns));
    }
}
