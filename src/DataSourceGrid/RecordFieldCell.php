<?php

namespace Midnight\Grid\DataSourceGrid;

use Midnight\Grid\CellInterface;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

class RecordFieldCell implements CellInterface
{
    /** @var \Midnight\Grid\DataSourceGrid\DataSource\RecordInterface */
    private $record;
    /** @var string */
    private $key;

    /**
     * RecordFieldCell constructor.
     * @param \Midnight\Grid\DataSourceGrid\DataSource\RecordInterface $record
     * @param string $key
     */
    public function __construct(RecordInterface $record, string $key)
    {
        $this->record = $record;
        $this->key = $key;
    }

    public function getData()
    {
        if (!$this->record->hasField($this->key)) {
            return null;
        }
        return $this->record->getField($this->key);
    }
}
