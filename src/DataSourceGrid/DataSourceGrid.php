<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid;

use Midnight\Grid\ColumnInterface;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;
use Midnight\Grid\GridInterface;
use Midnight\Grid\RowInterface;
use Midnight\Grid\SimpleColumn;

class DataSourceGrid implements GridInterface
{
    /** @var DataSource\DataSourceInterface */
    private $dataSource;

    public function __construct(DataSource\DataSourceInterface $dataSource)
    {
        $this->dataSource = $dataSource;
    }

    public function getRows(): iterable
    {
        return array_map([$this, 'createRow'], $this->dataSource->getRecords());
    }

    /**
     * @return string[]
     */
    public function getColumnKeys(): array
    {
        return $this->dataSource->getFieldNames();
    }

    public function getColumns(): iterable
    {
        return array_map([$this, 'createColumn'], $this->dataSource->getFieldNames());
    }

    private function createRow(RecordInterface $record): RowInterface
    {
        return new RecordRow($record);
    }

    private function createColumn(string $key): ColumnInterface
    {
        return new SimpleColumn($key);
    }
}
