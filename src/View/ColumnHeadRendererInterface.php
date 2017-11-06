<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\ColumnInterface;

interface ColumnHeadRendererInterface
{
    public function render(ColumnInterface $column): string;
}
