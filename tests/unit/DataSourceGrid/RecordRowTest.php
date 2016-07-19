<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid;

use Midnight\Grid\DataSourceGrid\DataSource\ArraySource\ArrayRecord;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;
use Midnight\Grid\DataSourceGrid\RecordRow;
use Midnight\Grid\SimpleColumn;
use PHPUnit_Framework_TestCase;

class RecordRowTest extends PHPUnit_Framework_TestCase
{
    /** @var RecordRow */
    private $row;
    /** @var RecordInterface */
    private $record;
    /** @var array */
    private $data = ['name' => 'Rudi', 'age' => 30];

    protected function setUp()
    {
        $this->record = new ArrayRecord($this->data);
        $this->row = new RecordRow($this->record);
    }

    public function testGetCell()
    {
        $cell = $this->row->getCell(new SimpleColumn('name'));
        $this->assertSame('Rudi', $cell->getData());

        $cell = $this->row->getCell(new SimpleColumn('age'));
        $this->assertSame(30, $cell->getData());
    }
}
