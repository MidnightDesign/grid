<?php

namespace Midnight\Grid;

/**
 * Class DataAware
 * @package Midnight\Grid
 */
abstract class DataAware implements DataInterface
{
    private $data = array();

    /**
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getData($key)
    {
        if(!isset($this->data[$key])) {
            return null;
        }
        return $this->data[$key];
    }
}