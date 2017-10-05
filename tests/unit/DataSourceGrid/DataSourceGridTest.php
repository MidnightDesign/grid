<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid;

use Midnight\Grid\ColumnInterface;
use Midnight\Grid\DataSourceGrid\DataSource\ArraySource\ArrayDataSource;
use Midnight\Grid\DataSourceGrid\DataSource\DataSourceInterface;
use Midnight\Grid\DataSourceGrid\DataSourceGrid;
use Midnight\Grid\RowInterface;
use PHPUnit_Framework_TestCase;

class DataSourceGridTest extends PHPUnit_Framework_TestCase
{
    /** @var DataSourceGrid */
    private $grid;
    /** @var DataSourceInterface */
    private $dataSource;
    /** @var array */
    private $data = [
        ['name' => 'Rudi', 'age' => 30],
        ['name' => 'Caro', 'age' => 25],
    ];

    public function testGetRowsReturnsArrayWithRows()
    {
        $rows = $this->grid->getRows();

        $this->assertInternalType('array', $rows);
        $this->assertContainsOnlyInstancesOf(RowInterface::class, $rows);
    }

    public function testGetFooterRow()
    {
        $row = $this->grid->getFooterRow();
        $columns = $this->grid->getColumns();

        $rowData = array_map(function($column) use ($row) {
            return $row->getCell($column)->getData();
        }, $columns);

        $this->assertSame(['Caro', 25], $rowData);
    }

    public function testGetColumnKeys()
    {
        $columnKeys = $this->grid->getColumnKeys();

        $this->assertSame('name', $columnKeys[0]);
        $this->assertSame('age', $columnKeys[1]);
    }

    public function testGetColumnsReturnsArrayWithColumns()
    {
        $columns = $this->grid->getColumns();

        $this->assertInternalType('array', $columns);
        $this->assertContainsOnlyInstancesOf(ColumnInterface::class, $columns);
    }

    protected function setUp()
    {
        $this->dataSource = new ArrayDataSource($this->data);
        $this->grid = new DataSourceGrid($this->dataSource);
    }
}
