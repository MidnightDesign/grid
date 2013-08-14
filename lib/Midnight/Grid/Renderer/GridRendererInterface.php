<?php

namespace Midnight\Grid\Renderer;

use Midnight\Grid\Grid\GridInterface;

interface GridRendererInterface
{

    /**
     * @param GridInterface $grid
     * @return string
     */
    public function render(GridInterface $grid);

}