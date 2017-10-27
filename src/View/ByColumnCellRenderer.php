<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;
use Midnight\Grid\View\Exception\UnknownColumnException;

class ByColumnCellRenderer implements CellRendererInterface
{
    /** @var CellRendererInterface[] */
    private $map;

    /**
     * @param CellRendererInterface[] $map
     */
    public function __construct(array $map)
    {
        $this->map = $map;
    }

    public function render(CellInterface $cell, ColumnInterface $column): string
    {
        $columnKey = $column->getKey();
        if (!isset($this->map[$columnKey])) {
            throw new UnknownColumnException(sprintf(
                'There is no renderer defined for column "%s".',
                $columnKey
            ));
        }
        return $this->map[$columnKey]->render($cell, $column);
    }
}
