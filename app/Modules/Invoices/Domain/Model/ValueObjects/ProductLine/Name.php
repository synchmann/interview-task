<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine;

use App\Domain\ValueObject;

final class Name extends ValueObject
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function jsonSerialize(): string
    {
        return $this->name;
    }
}
