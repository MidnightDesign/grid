<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\DataSourceGrid\DataSource\ArraySource\ArrayDataSource;
use Midnight\Grid\DataSourceGrid\DataSource\DataSourceInterface;
use Midnight\Grid\DataSourceGrid\DataSourceGrid;
use Midnight\Grid\GridInterface;
use PHPUnit_Framework_TestCase;

final class HtmlRendererTest extends PHPUnit_Framework_TestCase
{
    /** @var DataSourceInterface */
    private $dataSource;

    /** @var GridInterface */
    private $grid;

    /** @var GridRendererInterface */
    private $renderer;

    public function testHtmlRenderer()
    {
        $html = $this->renderer->render($this->grid);

        $this->assertContains('<thead>', $html);
        $this->assertContains('<tbody>', $html);
        $this->assertContains('<tfoot>', $html);
    }

    protected function setUp()
    {
        $this->dataSource = new ArrayDataSource([
            ['name' => 'Rudi', 'age' => 30],
            ['name' => 'Caro', 'age' => 25],
            ['name' => 'Wolf', 'age' => 35],
            ['name' => '',     'age' => 30]
        ]);
        $this->grid = new DataSourceGrid($this->dataSource);
        $this->renderer = new HtmlRenderer();
    }
}
