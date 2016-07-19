<?php declare(strict_types = 1);

namespace Midnight\Grid\DataSourceGrid;

use Midnight\Grid\{
    CellInterface, ColumnInterface, DataSourceGrid\DataSource\RecordInterface, RowInterface
};

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
