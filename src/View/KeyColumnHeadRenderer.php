<?php declare(strict_types=1);

namespace Midnight\Grid\View;

use Midnight\Grid\ColumnInterface;

class KeyColumnHeadRenderer implements ColumnHeadRendererInterface
{
    public function render(ColumnInterface $column): string
    {
        return $column->getKey();
    }
}
