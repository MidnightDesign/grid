<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid;

use Midnight\Grid\CellInterface;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

final class RecordFieldCell implements CellInterface
{
    /** @var RecordInterface */
    private $record;
    /** @var string */
    private $key;

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
