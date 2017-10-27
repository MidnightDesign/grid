<?php declare(strict_types=1);

namespace MidnightTest\Unit\Grid\View;

use Exception;
use Midnight\Grid\SimpleCell;
use Midnight\Grid\SimpleColumn;
use Midnight\Grid\View\ExceptionFallbackCellRenderer;
use MidnightTest\Unit\Grid\TestDouble\CellRendererStub;
use MidnightTest\Unit\Grid\TestDouble\ExceptionThrowingCellRenderer;
use PHPUnit\Framework\TestCase;

class ExceptionFallbackCellRendererTest extends TestCase
{
    public function testUsePrimary()
    {
        $expected = 'Primary';
        $renderer = new ExceptionFallbackCellRenderer(new CellRendererStub($expected));

        $this->assertSame($expected, $renderer->render($this->cell(), $this->column()));
    }

    public function testFallback()
    {
        $expected = 'Secondary';
        $secondary = new CellRendererStub($expected);
        $renderer = new ExceptionFallbackCellRenderer(new ExceptionThrowingCellRenderer(), $secondary);

        $this->assertSame($expected, $renderer->render($this->cell(), $this->column()));
    }

    public function testNoMoreFallbacks()
    {
        $renderer = new ExceptionFallbackCellRenderer(
            new ExceptionThrowingCellRenderer(),
            new ExceptionThrowingCellRenderer(new Exception('My Exception'))
        );

        $this->expectExceptionMessage('My Exception');

        $renderer->render($this->cell(), $this->column());
    }

    private function cell(): SimpleCell
    {
        return new SimpleCell('My Data');
    }

    private function column(): SimpleColumn
    {
        return new SimpleColumn('column-a');
    }
}
