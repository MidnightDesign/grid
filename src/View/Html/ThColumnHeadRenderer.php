<?php declare(strict_types=1);

namespace Midnight\Grid\View\Html;

use Midnight\Grid\ColumnInterface;
use Midnight\Grid\View\ColumnHeadRendererInterface;

class ThColumnHeadRenderer implements ColumnHeadRendererInterface
{
    /** @var ColumnHeadRendererInterface */
    private $headRenderer;

    public function __construct(ColumnHeadRendererInterface $headRenderer)
    {
        $this->headRenderer = $headRenderer;
    }

    public function render(ColumnInterface $column): string
    {
        return "<th>{$this->headRenderer->render($column)}</th>";
    }
}
