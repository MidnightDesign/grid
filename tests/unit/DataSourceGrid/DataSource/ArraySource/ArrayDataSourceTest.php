<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid\DataSource\ArraySource;

use Midnight\Grid\DataSourceGrid\DataSource\ArraySource\ArrayDataSource;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;
use PHPUnit_Framework_TestCase;

class ArrayDataSourceTest extends PHPUnit_Framework_TestCase
{
    /** @var array */
    private $data = [
        ['name' => 'Rudi', 'age' => 30],
        ['name' => 'Caro', 'age' => 25],
    ];
    private $footerData = [
        ['name' => '', 'age' => 27.5]
    ];
    /** @var ArrayDataSource */
    private $dataSource;

    public function testGetRecordsReturnsRecords()
    {
        $records = $this->dataSource->getRecords();

        $this->assertContainsOnlyInstancesOf(RecordInterface::class, $records);
    }

    public function testGetFooterRecord()
    {
        $records = $this->dataSource->getFooterRecords();

        $this->assertContainsOnlyInstancesOf(RecordInterface::class, $records);
        $this->assertCount(1, $records);
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
        $this->dataSource = new ArrayDataSource($this->data, $this->footerData);
    }
}
