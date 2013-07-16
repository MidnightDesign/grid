<?php

namespace Midnight\Grid\Renderer\Html;

/**
 * @property string tagName
 */
abstract class AbstractGridElement
{

    protected function getOpenTag()
    {
        return '<' . $this->getTagName() . '>';
    }

    protected function getCloseTag()
    {
        return '</' . $this->getTagName() . '>';
    }

    private function getTagName()
    {
        if($this->tagName === null) {
            throw new \Exception('No tag name defined');
        }
        return $this->tagName;
    }

}