<?php

namespace MidnightTest\Unit\Grid;

use Midnight\Grid\SimpleColumn;
use PHPUnit_Framework_TestCase;

class SimpleColumnTest extends PHPUnit_Framework_TestCase
{
    /** @var SimpleColumn */
    private $column;
    /** @var string */
    private $key;

    public function testGetKey()
    {
        $this->assertSame($this->key, $this->column->getKey());
    }

    public function testGetLabelReturnsKeyIfNoLabelIsSet()
    {
        $this->assertSame($this->key, $this->column->getLabel());
    }

    public function testWithLabelReturnsDifferentInstance()
    {
        $clone = $this->column->withLabel('Bar');

        $this->assertNotSame($this->column, $clone);
    }

    /**
     * @depends testWithLabelReturnsDifferentInstance
     */
    public function testWithLabelUpdatesLabel()
    {
        $label = 'Bar';

        $clone = $this->column->withLabel($label);

        $this->assertSame($label, $clone->getLabel());
    }

    protected function setUp()
    {
        $this->key = 'foo';
        $this->column = new SimpleColumn($this->key);
    }
}
