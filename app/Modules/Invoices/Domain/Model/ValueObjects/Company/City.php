<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\Company;

use App\Domain\ValueObject;

final class City extends ValueObject
{
    private string $city;

    public function __construct(string $city)
    {
        $this->city = $city;
    }

    public function __toString(): string
    {
        return $this->city;
    }

    public function jsonSerialize(): string
    {
        return $this->city;
    }
}
