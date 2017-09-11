<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\Exception\UnknownFieldException;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

class GetterObjectRecord implements RecordInterface
{
    /** @var object */
    private $object;
    /** @var string[] */
    private $getterMap;

    /**
     * @param string[] $getterMap
     */
    public function __construct($object, array $getterMap)
    {
        $this->object = $object;
        $this->getterMap = $getterMap;
    }

    /**
     * @return mixed
     * @throws UnknownFieldException
     */
    public function getField(string $key)
    {
        if (!$this->hasField($key)) {
            throw UnknownFieldException::fromFieldName($key);
        }
        return $this->object->{$this->keyToGetter($key)}();
    }

    public function hasField(string $key): bool
    {
        return array_key_exists($key, $this->getterMap);
    }

    private function keyToGetter(string $key): string
    {
        return $this->getterMap[$key];
    }
}
