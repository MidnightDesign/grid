<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid\DataSource\ArraySource;

use Midnight\Grid\DataSourceGrid\DataSource\DataSourceInterface;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

final class ArrayDataSource implements DataSourceInterface
{
    /** @var array */
    private $data;
    /** @var array */
    private $footerData;

    public function __construct(array $data, array $footerData = [])
    {
        $this->data = $data;
        $this->footerData = $footerData;
    }

    public function getRecords(): iterable
    {
        return array_map([$this, 'createRecord'], $this->data);
    }

    public function getFieldNames(): array
    {
        return array_unique(array_reduce($this->data, function (array $fieldNames, array $recordData) {
            return array_merge($fieldNames, array_keys($recordData));
        }, []));
    }

    private function createRecord(array $data): RecordInterface
    {
        return new ArrayRecord($data);
    }

    public function getFooterRecords(): iterable
    {
        return array_map([$this, 'createRecord'], $this->footerData);
    }
}
