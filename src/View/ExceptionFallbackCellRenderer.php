<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;
use Throwable;

class ExceptionFallbackCellRenderer implements CellRendererInterface
{
    /** @var CellRendererInterface[] */
    private $renderers;

    public function __construct(CellRendererInterface $primary, CellRendererInterface ...$renderers)
    {
        $this->renderers = array_merge([$primary], $renderers);
    }

    public function render(CellInterface $cell, ColumnInterface $column): string
    {
        return $this->doRender($cell, $column);
    }

    private function doRender(CellInterface $cell, ColumnInterface $column, int $index = 0): string
    {
        try {
            return $this->renderers[$index]->render($cell, $column);
        } catch (Throwable $e) {
            if (!isset($this->renderers[$index + 1])) {
                throw $e;
            }
            return $this->doRender($cell, $column, $index + 1);
        }
    }
}
