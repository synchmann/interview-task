<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\Entities;

use App\Domain\Entity;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\Uuid;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\City;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Email;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Name;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Phone;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Street;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Zip;

class Company extends Entity
{
    public function __construct(
        private readonly Uuid $uuid,
        private readonly Name $name,
        private readonly Street $street,
        private readonly City $city,
        private readonly Zip $zip,
        private readonly Phone $phone,
        private readonly Email $email,
    ) {
    }

    public function toArray(): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'street' => $this->street,
            'city' => $this->city,
            'zip' => $this->zip,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
