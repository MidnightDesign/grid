<?php declare(strict_types = 1);

namespace Midnight\Grid\View;

use Midnight\Grid\{
    ColumnInterface, GridInterface, RowInterface
};

/**
 * @todo Use a template
 */
class HtmlRenderer implements GridRendererInterface
{
    public function render(GridInterface $grid):string
    {
        return "<table>{$this->thead($grid)}{$this->tbody($grid)}</table>";
    }

    private function thead(GridInterface $grid):string
    {
        return "<thead><tr>{$this->headers($grid)}</tr></thead>";
    }

    private function headers(GridInterface $grid):string
    {
        return join("\n", array_map([$this, 'th'], $grid->getColumns()));
    }

    private function th(ColumnInterface $column):string
    {
        return "<th>{$column->getKey()}</th>";
    }

    private function tbody(GridInterface $grid):string
    {
        return "<tbody>{$this->rows($grid)}</tbody>";
    }

    private function rows(GridInterface $grid):string
    {
        return join("\n", array_map(function (RowInterface $row) use ($grid) {
            return "<tr>{$this->cells($row, $grid->getColumns())}</tr>";
        }, $grid->getRows()));
    }

    /**
     * @param ColumnInterface[] $columns
     */
    private function cells(RowInterface $row, array $columns):string
    {
        return join("\n", array_map(function (ColumnInterface $column) use ($row) {
            return "<td>{$row->getCell($column)->getData()}</td>";
        }, $columns));
    }
}
