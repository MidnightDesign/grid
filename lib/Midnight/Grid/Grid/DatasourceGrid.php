<?php

namespace Midnight\Grid\Grid;

use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\Datasource\DatasourceInterface;
use Midnight\Grid\Row\RowInterface;

class DatasourceGrid implements DatasourceGridInterface
{
    /**
     * @var DatasourceInterface
     */
    private $ds;

    function __construct(DatasourceInterface $ds)
    {
        $this->ds = $ds;
    }

    /**
     * @return RowInterface[]
     */
    public function getRows()
    {
        $this->ds->getData();
    }

    /**
     * @return ColumnInterface[]
     */
    public function getColumns()
    {
        $this->ds->getColumns();
    }
}