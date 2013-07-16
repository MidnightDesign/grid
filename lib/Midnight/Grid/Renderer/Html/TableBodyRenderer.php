<?php

namespace Midnight\Grid\Renderer\Html;

use Midnight\Grid\GridInterface;

class TableBodyRenderer {

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
        return '<tbody>';
    }

    private function getCloseTag()
    {
        return '</tbody>';
    }

    private function getContents()
    {
        $r = array();
        $rows = $this->getGrid()->getRows();
        $rowRenderer = new RowRenderer();
        foreach($rows as $row) {
            $r[] = $rowRenderer->render($row);
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