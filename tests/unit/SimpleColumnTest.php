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

    public function testSetLabel()
    {
        $label = 'Bar';

        $this->column->setLabel($label);

        $this->assertSame($label, $this->column->getLabel());
    }

    protected function setUp()
    {
        $this->key = 'foo';
        $this->column = new SimpleColumn($this->key);
    }
}
