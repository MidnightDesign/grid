<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

interface ObjectRecordFactoryInterface
{
    /**
     * @param object $object
     */
    public function create($object): RecordInterface;

    /**
     * @return string[]
     */
    public function getFieldNames(): array;
}
