<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid;

use Midnight\Grid\DataSourceGrid\DataSource\ArraySource\ArrayRecord;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;
use Midnight\Grid\DataSourceGrid\RecordFieldCell;
use PHPUnit_Framework_TestCase;

class RecordFieldCellTest extends PHPUnit_Framework_TestCase
{
    /** @var string */
    private $name = 'Rudi';
    /** @var RecordFieldCell */
    private $cell;
    /** @var RecordInterface */
    private $record;
    /** @var string */
    private $columnKey = 'name';
    /** @var array */
    private $data;

    protected function setUp()
    {
        $this->data = [$this->columnKey => $this->name, 'age' => 30];
        $this->record = new ArrayRecord($this->data);
        $this->cell = new RecordFieldCell($this->record, $this->columnKey);
    }

    public function testGetData()
    {
        $this->assertSame($this->name, $this->cell->getData());
    }

    public function testGetDataReturnsNullIfColumnDoesNotExist()
    {
        $this->cell = new RecordFieldCell($this->record, 'does-not-exist');

        $this->assertNull($this->cell->getData());
    }
}
