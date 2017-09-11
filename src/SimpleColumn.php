<?php declare(strict_types=1);

namespace Midnight\Grid;

final class SimpleColumn implements ColumnInterface
{
    /** @var string */
    private $key;
    /** @var string */
    private $label;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getLabel(): string
    {
        if ($this->label === null) {
            return $this->getKey();
        }
        return $this->label;
    }

    public function withLabel(string $label): self
    {
        $clone = clone $this;
        $clone->label = $label;
        return $clone;
    }
}
