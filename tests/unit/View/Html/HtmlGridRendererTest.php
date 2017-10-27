<?php declare(strict_types=1);

namespace MidnightTest\Unit\Grid\View\Html;

use Midnight\Grid\DataSourceGrid\DataSource\ArraySource\ArrayDataSource;
use Midnight\Grid\DataSourceGrid\DataSourceGrid;
use Midnight\Grid\View\GridRendererInterface;
use Midnight\Grid\View\Html\HtmlGridRenderer;
use PHPUnit_Framework_TestCase;

final class HtmlGridRendererTest extends PHPUnit_Framework_TestCase
{
    /** @var GridRendererInterface */
    private $renderer;

    public function testHtmlRenderer()
    {
        $dataSource = new ArrayDataSource(
            [
                ['name' => 'Rudi', 'age' => 30],
                ['name' => 'Caro', 'age' => 25],
                ['name' => 'Wolf', 'age' => 35],
            ],
            [
                ['name' => '', 'age' => 30],
            ]
        );
        $grid = new DataSourceGrid($dataSource);
        $html = $this->renderer->render($grid);

        $this->assertContains('<thead>', $html);
        $this->assertContains('<tbody>', $html);
        $this->assertContains('<tfoot>', $html);
    }

    public function testHtmlRendererWithoutFooterRow()
    {
        $dataSource = new ArrayDataSource(
            [
                ['name' => 'Rudi', 'age' => 30],
                ['name' => 'Caro', 'age' => 25],
                ['name' => 'Wolf', 'age' => 35],
            ]
        );
        $grid = new DataSourceGrid($dataSource);
        $html = $this->renderer->render($grid);

        $this->assertContains('<thead>', $html);
        $this->assertContains('<tbody>', $html);
        $this->assertNotContains('<tfoot>', $html);
    }

    protected function setUp()
    {
        $this->renderer = new HtmlGridRenderer();
    }
}
