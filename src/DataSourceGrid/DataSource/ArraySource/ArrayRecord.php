<?php declare(strict_types=1);

namespace Midnight\Grid\DataSourceGrid\DataSource\ArraySource;

use Midnight\Grid\DataSourceGrid\DataSource\Exception\UnknownFieldException;
use Midnight\Grid\DataSourceGrid\DataSource\RecordInterface;

final class ArrayRecord implements RecordInterface
{
    /** @var array */
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getField(string $key)
    {
        if (!$this->hasField($key)) {
            throw UnknownFieldException::fromFieldName($key);
        }
        return $this->data[$key];
    }

    public function hasField(string $key): bool
    {
        return array_key_exists($key, $this->data);
    }
}
