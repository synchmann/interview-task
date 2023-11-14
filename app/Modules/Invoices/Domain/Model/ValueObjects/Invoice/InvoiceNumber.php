<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\Invoice;

use App\Domain\ValueObject;

final class InvoiceNumber extends ValueObject
{
    private string $number;

    public function __construct(?string $number)
    {
        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->number;
    }

    public function jsonSerialize(): string
    {
        return $this->number;
    }
}
