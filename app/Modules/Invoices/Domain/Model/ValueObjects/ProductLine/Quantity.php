<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine;

use App\Domain\ValueObject;

final class Quantity extends ValueObject
{
    private int $quantity;

    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function __toString(): string
    {
        return (string) $this->quantity;
    }

    public function getValue(): int
    {
        return $this->quantity;
    }

    public function jsonSerialize(): int
    {
        return $this->quantity;
    }
}
