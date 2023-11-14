<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine;

use App\Domain\ValueObject;

final class Price extends ValueObject
{
    private int $price;

    public function __construct(int $price)
    {
        $this->price = $price;
    }

    public function getFormatted(): float
    {
        return (float) $this->price / 100;
    }

    public function __toString(): string
    {
        return (string) $this->price;
    }

    public function jsonSerialize(): int
    {
        return $this->price;
    }
}
