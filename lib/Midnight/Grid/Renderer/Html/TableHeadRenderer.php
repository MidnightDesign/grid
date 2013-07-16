<?php

namespace Midnight\Grid\Renderer\Html;

use Midnight\Grid\GridInterface;
use Midnight\Grid\Renderer\Html\TableHeaderRenderer;

class TableHeadRenderer {

    /**
     * @var GridInterface
     */
    private $grid;

    public function render(GridInterface $grid) {
        $this->setGrid($grid);
        return $this->getOpenTag().$this->getContents().$this->getCloseTag();
    }

    private function getOpenTag()
    {
        return '<thead><tr>';
    }

    private function getCloseTag()
    {
        return '</tr></thead>';
    }

    private function getContents()
    {
        $r = array();
        $columns = $this->getGrid()->getColumns();
        $tableHeaderRenderer = new TableHeaderRenderer();
        foreach($columns as $column) {
            $r[] = $tableHeaderRenderer->render($column);
        }
        return join(PHP_EOL, $r);
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