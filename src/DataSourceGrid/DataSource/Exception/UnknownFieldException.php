<?php

namespace Midnight\Grid\DataSourceGrid\DataSource\Exception;

use RuntimeException;

class UnknownFieldException extends RuntimeException
{
    public static function fromFieldName(string $field):UnknownFieldException
    {
        return new self(sprintf('Unknown field "%s".', $field));
    }
}
