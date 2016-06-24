<?php

namespace Midnight\Grid\DataSourceGrid;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;
use Midnight\Grid\RowInterface;

class RecordRow implements RowInterface
{
    /** @var RecordInterface */
    private $record;

    public function __construct(RecordInterface $record)
    {
        $this->record = $record;
    }

    public function getCell(ColumnInterface $column):CellInterface
    {
        return new RecordFieldCell($this->record, $column->getKey());
    }
}
