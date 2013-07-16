<?php

namespace Midnight\Grid\Renderer\Html;

use Midnight\Grid\Grid;
use Midnight\Grid\GridInterface;
use Midnight\Grid\Renderer\GridRendererInterface;

class HtmlGridRenderer implements GridRendererInterface
{
    /**
     * @var GridInterface
     */
    private $grid;

    public function render(GridInterface $grid)
    {
        $this->setGrid($grid);
        return $this->getOpenTag() . $this->getContents() . $this->getCloseTag();
    }

    private function getOpenTag()
    {
        return '<table>';
    }

    private function getContents()
    {
        return $this->getHead().$this->getBody();
    }

    private function getCloseTag()
    {
        return '</table>';
    }

    private function getHead()
    {
        $renderer = new TableHeadRenderer();
        return $renderer->render($this->getGrid());
    }

    private function getBody()
    {
        $renderer = new TableBodyRenderer();
        return $renderer->render($this->getGrid());
    }

    private function getGrid()
    {
        return $this->grid;
    }

    private function setGrid(GridInterface $grid)
    {
        $this->grid = $grid;
    }
}