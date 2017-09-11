<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord\GetterRecordFactory;
use Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord\ObjectArrayDataSource;
use Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord\ObjectRecordFactoryInterface;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;
use PHPUnit_Framework_TestCase;

class ObjectArrayDataSourceTest extends PHPUnit_Framework_TestCase
{
    /** @var ObjectArrayDataSource */
    private $dataSource;
    /** @var object[] */
    private $objects;
    /** @var ObjectRecordFactoryInterface */
    private $recordFactory;

    public function testGetRecordsReturnsAnArrayOfRecords()
    {
        $records = $this->dataSource->getRecords();

        $this->assertCount(2, $records);
        $this->assertContainsOnlyInstancesOf(RecordInterface::class, $records);
    }

    public function testGetFieldNames()
    {
        $fieldNames = $this->dataSource->getFieldNames();

        $this->assertCount(2, $fieldNames);
        $this->assertContains('name', $fieldNames);
        $this->assertContains('age', $fieldNames);
    }

    protected function setUp()
    {
        $this->objects = [
            new Person('Rudi', 30),
            new Person('Caro', 25),
        ];
        $this->recordFactory = new GetterRecordFactory(['name' => 'getName', 'age' => 'getAge']);
        $this->dataSource = new ObjectArrayDataSource($this->objects, $this->recordFactory);
    }
}
