<?php

namespace Midnight\Grid\DataSourceGrid\DataSource;

interface RecordInterface
{
    /**
     * @return mixed
     * @throws Exception\UnknownFieldException
     */
    public function getField(string $key);

    public function hasField(string $key):bool;
}
