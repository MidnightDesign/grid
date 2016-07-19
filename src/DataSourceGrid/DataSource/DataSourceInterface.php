<?php declare(strict_types = 1);

namespace Midnight\Grid\DataSourceGrid\DataSource;

interface DataSourceInterface
{
    /**
     * @return RecordInterface[]
     */
    public function getRecords():array;

    /**
     * @return string[]
     */
    public function getFieldNames():array;
}
