<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid\DataSource\ArraySource;

use Midnight\Grid\DataSourceGrid\DataSource\ArraySource\ArrayRecord;
use Midnight\Grid\DataSourceGrid\DataSource\Exception\UnknownFieldException;
use PHPUnit_Framework_TestCase;

class ArrayRecordTest extends PHPUnit_Framework_TestCase
{
    /** @var array */
    private $data = ['name' => 'Rudi', 'age' => 30];
    /** @var ArrayRecord */
    private $record;

    protected function setUp()
    {
        $this->record = new ArrayRecord($this->data);
    }

    public function testGetField()
    {
        $this->assertSame('Rudi', $this->record->getField('name'));
        $this->assertSame(30, $this->record->getField('age'));
    }

    public function testGetFieldThrowsExceptionIfAnUnknownFieldIsRequested()
    {
        $this->expectException(UnknownFieldException::class);

        $this->record->getField('does-not-exist');
    }

    public function testHasField()
    {
        $this->assertTrue($this->record->hasField('name'));
        $this->assertTrue($this->record->hasField('age'));
        $this->assertFalse($this->record->hasField('does-not-exist'));
    }
}
