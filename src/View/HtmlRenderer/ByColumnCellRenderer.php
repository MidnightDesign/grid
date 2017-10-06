<?php declare(strict_types=1);

namespace Midnight\Grid\View\HtmlRenderer;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;

class ByColumnCellRenderer implements CellRendererInterface
{
    /** @var CellRendererInterface[] */
    private $map;
    /** @var CellRendererInterface */
    private $fallback;

    /**
     * @param CellRendererInterface[] $map
     */
    public function __construct(array $map, CellRendererInterface $fallback = null)
    {
        $this->map = $map;
        $this->fallback = $fallback ?? new SimpleCellRenderer();
    }

    public function render(CellInterface $cell, ColumnInterface $column): string
    {
        return ($this->map[$column->getKey()] ?? $this->fallback)->render($cell, $column);
    }
}
