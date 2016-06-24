<?php

namespace Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\DataSourceInterface;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

class ObjectArrayDataSource implements DataSourceInterface
{
    /** @var object[] */
    private $objects;
    /** @var ObjectRecordFactoryInterface */
    private $recordFactory;

    /**
     * ObjectArrayDataSource constructor.
     * @param object[] $objects
     * @param ObjectRecordFactoryInterface $recordFactory
     */
    public function __construct(array $objects, ObjectRecordFactoryInterface $recordFactory)
    {
        $this->objects = $objects;
        $this->recordFactory = $recordFactory;
    }

    /**
     * @return RecordInterface[]
     */
    public function getRecords():array
    {
        return array_map([$this->recordFactory, 'create'], $this->objects);
    }

    /**
     * @return string[]
     */
    public function getFieldNames():array
    {
        return $this->recordFactory->getFieldNames();
    }
}
