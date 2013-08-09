<?php

namespace MidnightTest\Grid;

use Midnight\Grid\Grid;

class GridTest extends \PHPUnit_Framework_TestCase {

    public function testCanCreateGrid() {
        $grid = new Grid();
        $this->assertInstanceOf('Midnight\Grid\Grid', $grid);
    }

}
