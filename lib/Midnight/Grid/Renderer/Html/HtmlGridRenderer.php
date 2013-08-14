<?php

namespace Midnight\Grid\Renderer\Html;

use DOMDocument;
use DOMElement;
use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\Grid;
use Midnight\Grid\Grid\GridInterface;
use Midnight\Grid\Renderer\GridRendererInterface;
use Midnight\Grid\Row\RowInterface;

class HtmlGridRenderer implements GridRendererInterface
{
    /**
     * @var Grid\GridInterface
     */
    private $grid;
    /**
     * @var DOMDocument
     */
    private $document;

    /**
     * @param GridInterface $grid
     * @return string
     */
    public function render(GridInterface $grid)
    {
        $this->grid = $grid;
        $this->document = new DOMDocument();
        $table = $this->document->createElement('table');
        $table->appendChild($this->body());
        $table->appendChild($this->head());
        $this->document->appendChild($table);
        return $this->document->saveHTML();
    }

    private function body()
    {
        $tbody = $this->document->createElement('tbody');
        foreach ($this->grid->getRows() as $row) {
            $tbody->appendChild($this->row($row));
        }
        return $tbody;
    }

    private function row(RowInterface $row)
    {
        $tr = $this->document->createElement('tr');
        foreach ($this->grid->getColumns() as $column) {
            $cell = $row->getCell($column);
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
        $td = $this->document->createElement('td');
        try {
            $td->appendChild($this->document->createTextNode($cell->getValue()));
        } catch (\Exception $e) {
            var_dump($td);
            die;
        }
        return $td;
    }

    private function head()
    {
        $thead = $this->document->createElement('thead');
        $tr = $this->document->createElement('tr');
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