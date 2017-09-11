<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

class GetterRecordFactory implements ObjectRecordFactoryInterface
{
    /** @var string[] */
    private $getterMap;

    /**
     * @param string[] $getterMap
     */
    public function __construct(array $getterMap)
    {
        $this->getterMap = $getterMap;
    }

    /**
     * @param object $object
     */
    public function create($object): RecordInterface
    {
        return new GetterObjectRecord($object, $this->getterMap);
    }

    /**
     * @return string[]
     */
    public function getFieldNames(): array
    {
        return array_keys($this->getterMap);
    }
}
