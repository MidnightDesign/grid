<?php declare(strict_types=1);

namespace MidnightTest\Unit\Grid\View\Html;

use Midnight\Grid\SimpleColumn;
use Midnight\Grid\View\Html\ThColumnHeadRenderer;
use Midnight\Grid\View\KeyColumnHeadRenderer;
use PHPUnit_Framework_TestCase;

final class HeadRendererTest extends PHPUnit_Framework_TestCase
{
    public function testKeyColumnHeadRenderer()
    {
        $headRenderer = new KeyColumnHeadRenderer();
        $column = new SimpleColumn('test-key');

        $this->assertSame($column->getKey(), $headRenderer->render($column));
    }

    public function testThColumnHeadRenderer()
    {
        $keyHeadRenderer = new KeyColumnHeadRenderer();
        $headRenderer = new ThColumnHeadRenderer($keyHeadRenderer);
        $column = new SimpleColumn('test-key');

        $this->assertContains('<th>', $headRenderer->render($column));
        $this->assertContains($column->getKey(), $headRenderer->render($column));
        $this->assertContains('</th>', $headRenderer->render($column));
    }
}
