<?php

namespace Midnight\Grid;

interface DataInterface
{
    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setData($key, $value);

    /**
     * @param string $key
     * @return mixed
     */
    public function getData($key);
}