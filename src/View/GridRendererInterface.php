<?php

namespace Midnight\Grid\View;

use Midnight\Grid\GridInterface;

interface GridRendererInterface
{
    public function render(GridInterface $grid):string;
}
