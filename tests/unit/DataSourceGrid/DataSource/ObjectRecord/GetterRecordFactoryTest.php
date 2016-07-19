<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord\GetterRecordFactory;
use PHPUnit_Framework_TestCase;

class GetterRecordFactoryTest extends PHPUnit_Framework_TestCase
{
    /** @var GetterRecordFactory */
    private $factory;

    protected function setUp()
    {
        $this->factory = new GetterRecordFactory(['name' => 'getName', 'age' => 'getAge']);
    }

    public function testCreate()
    {
        $record = $this->factory->create(new Person('Rudi', 30));

        $this->assertSame('Rudi', $record->getField('name'));
        $this->assertSame(30, $record->getField('age'));
    }

    public function testGetFieldNames()
    {
        $fieldNames = $this->factory->getFieldNames();

        $this->assertCount(2, $fieldNames);
        $this->assertContains('name', $fieldNames);
        $this->assertContains('age', $fieldNames);
    }
}
