<?php

declare(strict_types=1);

namespace App\Domain;

use JsonSerializable;

abstract class ValueObject implements JsonSerializable
{
    public function equals(ValueObject $other): bool
    {
        return $this->jsonSerialize() === $other->jsonSerialize();
    }
}
