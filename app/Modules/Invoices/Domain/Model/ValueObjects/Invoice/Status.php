<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\Invoice;

use App\Domain\ValueObject;

final class Status extends ValueObject
{
    private string $status;

    public function __construct(?string $status)
    {
        $this->status = $status;
    }

    public function __toString(): string
    {
        return $this->status;
    }

    public function jsonSerialize(): string
    {
        return $this->status;
    }
}
