<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\Company;

use App\Domain\ValueObject;

final class Street extends ValueObject
{
    private string $street;

    public function __construct(string $street)
    {
        $this->street = $street;
    }

    public function __toString(): string
    {
        return $this->street;
    }

    public function jsonSerialize(): string
    {
        return $this->street;
    }
}
