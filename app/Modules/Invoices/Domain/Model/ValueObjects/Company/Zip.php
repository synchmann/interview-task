<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\ValueObjects\Company;

use App\Domain\ValueObject;

final class Zip extends ValueObject
{
    private string $zip;

    public function __construct(string $zip)
    {
        $this->zip = $zip;
    }

    public function __toString(): string
    {
        return $this->zip;
    }

    public function jsonSerialize(): string
    {
        return $this->zip;
    }
}
