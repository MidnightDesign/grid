<?php

namespace Midnight\Grid\Renderer\Html;

use Midnight\Grid\Cell\Cell;
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
        return $this->getOpenTag() . $this->getContents() . $this->getCloseTag();
    }

    private function getContents()
    {
        $r = array();
        $columns = $this->getRow()->getGrid()->getColumns();
        $cellRenderer = new CellRenderer();
        foreach ($columns as $column) {
            try {
                $r[] = $cellRenderer->render($this->getRow()->getCells()->offsetGet($column));
            } catch (\Exception $e) {
                $r[] = $cellRenderer->render(new Cell());
            }
        }
        return join(PHP_EOL, $r);
    }

    private function setRow(RowInterface $row)
    {
        $this->row = $row;
    }

    /**
     * @return RowInterface
     */
    private function getRow()
    {
        return $this->row;
    }

}