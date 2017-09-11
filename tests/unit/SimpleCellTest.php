<?php

namespace MidnightTest\Unit\Grid;

use Midnight\Grid\SimpleCell;
use PHPUnit_Framework_TestCase;

class SimpleCellTest extends PHPUnit_Framework_TestCase
{
    /** @var mixed */
    private $data;
    /** @var SimpleCell */
    private $cell;

    public function testGetData()
    {
        $this->assertSame($this->data, $this->cell->getData());
    }

    protected function setUp()
    {
        $this->data = 'Foo';
        $this->cell = new SimpleCell($this->data);
    }
}
