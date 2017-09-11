<?php

namespace MidnightTest\Unit\Grid\DataSourceGrid\DataSource\ObjectRecord;

use Midnight\Grid\DataSourceGrid\DataSource\Exception\UnknownFieldException;
use Midnight\Grid\DataSourceGrid\DataSource\ObjectRecord\GetterObjectRecord;
use PHPUnit_Framework_TestCase;

class GetterObjectRecordTest extends PHPUnit_Framework_TestCase
{
    /** @var object */
    private $object;
    /** @var GetterObjectRecord */
    private $record;

    public function testGetField()
    {
        $this->assertSame('Rudi', $this->record->getField('name'));
        $this->assertSame(30, $this->record->getField('age'));
    }

    public function testGetFieldThrowsExceptionIfKeyIsUnknown()
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

    protected function setUp()
    {
        $this->object = new Person('Rudi', 30);
        $this->record = new GetterObjectRecord($this->object, ['name' => 'getName', 'age' => 'getAge']);
    }
}
