<?php

namespace Midnight\Grid\Datasource;

use Midnight\Grid\Column\ColumnInterface;

interface DatasourceInterface
{
    /**
     * @return mixed[][]
     */
    public function getData();

    /**
     * @return ColumnInterface[]
     */
    public function getColumns();
}