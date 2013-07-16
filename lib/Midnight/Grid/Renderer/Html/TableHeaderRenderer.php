<?php

namespace Midnight\Grid\Renderer\Html;

use Midnight\Grid\Column\ColumnInterface;

class TableHeaderRenderer extends AbstractGridElement
{
    /**
     * @var ColumnInterface
     */
    private $column;
    protected $tagName = 'th';

    public function render(ColumnInterface $column)
    {
        $this->setColumn($column);
        return $this->getOpenTag() . $this->getContent() . $this->getCloseTag();
    }

    private function getContent()
    {
        return $this->getColumn()->getName();
    }

    private function setColumn(ColumnInterface $column)
    {
        $this->column = $column;
    }

    private function getColumn()
    {
        return $this->column;
    }

}