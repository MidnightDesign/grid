<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\DataSourceInterface;

final class ObjectArrayDataSource implements DataSourceInterface
{
    /** @var object[] */
    private $objects;
    /** @var object[] */
    private $footerObjects;
    /** @var ObjectRecordFactoryInterface */
    private $recordFactory;

    /**
     * @param object[] $objects
     * @param object[] $footerObjects
     * @param ObjectRecordFactoryInterface $recordFactory
     */
    public function __construct(array $objects, array $footerObjects = [], ObjectRecordFactoryInterface $recordFactory)
    {
        $this->objects = $objects;
        $this->footerObjects = $footerObjects;
        $this->recordFactory = $recordFactory;
    }

    public function getRecords(): array
    {
        return array_map([$this->recordFactory, 'create'], $this->objects);
    }

    public function getFieldNames(): array
    {
        return $this->recordFactory->getFieldNames();
    }

    public function getFooterRecords(): iterable
    {
        return array_map([$this->recordFactory, 'create'], $this->footerObjects);
    }
}
