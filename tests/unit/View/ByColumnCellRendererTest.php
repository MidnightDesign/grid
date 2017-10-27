<?php declare(strict_types=1);

namespace MidnightTest\Unit\Grid\View;

use Midnight\Grid\SimpleCell;
use Midnight\Grid\SimpleColumn;
use Midnight\Grid\View\ByColumnCellRenderer;
use Midnight\Grid\View\Exception\UnknownColumnException;
use MidnightTest\Unit\Grid\TestDouble\CellRendererStub;
use PHPUnit\Framework\TestCase;

class ByColumnCellRendererTest extends TestCase
{
    public function testUnknownColumn()
    {
        $colA = new SimpleColumn('column-a');
        $renderer = new ByColumnCellRenderer([$colA->getKey() => new CellRendererStub('test')]);

        $this->expectException(UnknownColumnException::class);

        $renderer->render($this->cell(), new SimpleColumn('column-b'));
    }

    public function testCorrectRendererIsCalled()
    {
        $colA = new SimpleColumn('column-a');
        $colB = new SimpleColumn('column-b');
        $renderer = new ByColumnCellRenderer([
            $colA->getKey() => new CellRendererStub('Column A'),
            $colB->getKey() => new CellRendererStub('Column B'),
        ]);

        $this->assertSame('Column A', $renderer->render($this->cell(), $colA));
        $this->assertSame('Column B', $renderer->render($this->cell(), $colB));
    }

    private function cell(): SimpleCell
    {
        return new SimpleCell('My Data');
    }
}
