<?php declare(strict_types=1);

namespace Midnight\Grid;

interface GridInterface
{
    /**
     * @return RowInterface[]
     */
    public function getRows(): iterable;

    /**
     * @return ColumnInterface[]
     */
    public function getColumns(): iterable;
}
