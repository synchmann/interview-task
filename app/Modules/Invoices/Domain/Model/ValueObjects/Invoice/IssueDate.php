<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\Invoice;

use App\Domain\ValueObject;

final class IssueDate extends ValueObject
{
    private string $date;

    public function __construct(?string $date)
    {
        $this->date = $date;
    }

    public function __toString(): string
    {
        return $this->date;
    }

    public function jsonSerialize(): string
    {
        return $this->date;
    }
}
