<?php declare(strict_types=1);

namespace MidnightTest\Unit\Grid\TestDouble;

use Exception;
use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;
use Midnight\Grid\View\CellRendererInterface;
use Throwable;

class ExceptionThrowingCellRenderer implements CellRendererInterface
{
    /** @var Throwable */
    private $exception;

    public function __construct(Throwable $exception = null)
    {
        $this->exception = $exception ?? new Exception('I\'m broken.');
    }

    public function render(CellInterface $cell, ColumnInterface $column): string
    {
        throw $this->exception;
    }
}
