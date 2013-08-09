<?php

namespace Midnight\Grid\Renderer\Html;

use DOMElement;
use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\Grid;
use Midnight\Grid\GridInterface;
use Midnight\Grid\Renderer\GridRendererInterface;
use Midnight\Grid\Row\RowInterface;

class HtmlGridRenderer implements GridRendererInterface
{
    /**
     * @var Grid\GridInterface
     */
    private $grid;
    /**
     * @var \DOMDocument
     */
    private $document;

    /**
     * @param GridInterface $grid
     * @return string
     */
    public function render(GridInterface $grid)
    {
        $this->document = new \DOMDocument();
        $this->document->saveHTML();
        $table = $this->document->createElement('table');
        $table->appendChild($this->body());
        $table->appendChild($this->head());
        return $this->document->saveHTML();
    }

    private function body()
    {
        $tbody = new DOMElement('tbody');
        foreach ($this->grid->getRows() as $row) {
            $tbody->appendChild($this->row($row));
        }
        return $tbody;
    }

    private function row(RowInterface $row)
    {
        $tr = new DOMElement('tr');
        foreach ($row->getCells() as $cell) {
            $tr->appendChild($this->cell($cell));
        }
        return $tr;
    }

    /**
     * @param $cell
     * @return DOMElement
     */
    private function cell(CellInterface $cell)
    {
        $td = new DOMElement('td');
        $td->appendChild(new \DOMText($cell->getValue()));
        return $td;
    }

    private function head()
    {
        $thead = new DOMElement('thead');
        $tr = new DOMElement('tr');
        $thead->appendChild($tr);
        foreach ($this->grid->getColumns() as $column) {
            $tr->appendChild($this->th($column));
        }
        return $thead;
    }

    private function th(ColumnInterface $column)
    {
        $th = $this->document->createElement('th');
        $th->appendChild($this->document->createTextNode($column->getLabel()));
        return $th;
    }
}