<?php declare(strict_types=1);

namespace MidnightTest\Unit\Grid\TestDouble;

use Midnight\Grid\CellInterface;
use Midnight\Grid\ColumnInterface;
use Midnight\Grid\View\CellRendererInterface;

class CellRendererStub implements CellRendererInterface
{
    /** @var string */
    private $rendered;

    public function __construct(string $rendered)
    {
        $this->rendered = $rendered;
    }

    public function render(CellInterface $cell, ColumnInterface $column): string
    {
        return $this->rendered;
    }
}
