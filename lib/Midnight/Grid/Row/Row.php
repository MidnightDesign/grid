<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\GridInterface;

class Row implements RowInterface
{

    /**
     * @var GridInterface
     */
    private $grid;

    /**
     * @var \SplObjectStorage
     */
    private $cells;

    function __construct()
    {
        $this->cells = new \SplObjectStorage();
    }

    public function setGrid(GridInterface $grid)
    {
        $this->grid = $grid;
    }

    /**
     * @TODO This seems overly complex. There has to be a cleaner way.
     * @param CellInterface $cell
     * @param ColumnInterface|string $column
     */
    public function setCell(CellInterface $cell, $column)
    {
        if (is_string($column)) {
            $grid = $this->getGrid();
            if(is_null($grid)) {
                throw new \LogicException('The row must be added to a table before you can assign cells by column name.');
            }
            $columns = $grid->getColumns();
            $found = null;
            $columns->rewind();
            while (is_null($found)) {
                $current = $columns->current();
                if (!$current) {
                    throw new \InvalidArgumentException('Could not find a column named "' . $column . '".');
                }
                if ($current->getName() === $column) {
                    $found = $current;
                }
                $columns->next();
            }
            $column = $found;
        }
        if (!$column instanceof ColumnInterface) {
            throw new \InvalidArgumentException('The second parameter must implement Midnight\Grid\Column\ColumnInterface.');
        }
        $this->getCells()->attach($cell, $column);
        $cell->setRow($this);
    }

    /**
     * @return \Midnight\Grid\GridInterface
     */
    public function getGrid()
    {
        return $this->grid;
    }

    public function getCells()
    {
        return $this->cells;
    }
}