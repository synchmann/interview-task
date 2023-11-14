<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\Company;

use App\Domain\ValueObject;

final class Phone extends ValueObject
{
    private string $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function __toString(): string
    {
        return $this->phone;
    }

    public function jsonSerialize(): string
    {
        return $this->phone;
    }
}
