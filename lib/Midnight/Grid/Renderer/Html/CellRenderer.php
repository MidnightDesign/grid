<?php

namespace Midnight\Grid\Renderer\Html;

use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Row\RowInterface;

class CellRenderer extends AbstractGridElement
{
    /**
     * @var CellInterface
     */
    private $cell;
    protected $tagName = 'td';

    public function render(CellInterface $cell)
    {
        $this->setCell($cell);
        return $this->getOpenTag() . $this->getContent() . $this->getCloseTag();
    }

    private function getContent()
    {
        return $this->getCell()->getValue();
    }

    private function setCell(CellInterface $row)
    {
        $this->cell = $row;
    }

    private function getCell()
    {
        return $this->cell;
    }

}