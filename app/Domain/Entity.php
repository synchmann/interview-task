<?php

declare(strict_types=1);

namespace App\Domain;

abstract class Entity implements \JsonSerializable
{
    abstract public function toArray(): array;

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
