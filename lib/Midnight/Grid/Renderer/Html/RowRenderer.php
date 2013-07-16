<?php

namespace Midnight\Grid\Renderer\Html;

use Midnight\Grid\Row\RowInterface;

class RowRenderer extends AbstractGridElement
{
    /**
     * @var RowInterface
     */
    private $row;
    protected $tagName = 'tr';

    public function render(RowInterface $row)
    {
        $this->setRow($row);
        return $this->getOpenTag().$this->getContents().$this->getCloseTag();
    }

    private function getContents()
    {
        $r = array();
        $cells = $this->getRow()->getCells();
        $cellRenderer = new CellRenderer();
        foreach($cells as $cell) {
            $r[] = $cellRenderer->render($cell);
        }
        return join(PHP_EOL, $r);
    }

    private function setRow(RowInterface $row)
    {
        $this->row = $row;
    }

    private function getRow()
    {
        return $this->row;
    }

}