<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model\Entities;

use App\Domain\Entity;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\CreatedAt;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\UpdatedAt;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\Uuid;
use App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine\Name;
use App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine\Price;
use App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine\Quantity;

class ProductLine extends Entity
{
    public function __construct(
        private readonly Uuid $id,
        private readonly Name $name,
        private readonly Price $price,
        private readonly Quantity $quantity,
        private readonly CreatedAt $createdAt,
        private readonly UpdatedAt $updatedAt
    ) {
    }

    public function getPrice(): float
    {
        return $this->price->getFormatted();
    }

    public function getQuantity(): int
    {
        return $this->quantity->getValue();
    }

    public function toArray(): array
    {
        return [
            'uuid'       => $this->id,
            'name'       => $this->name,
            'price'      => $this->getPrice(),
            'quantity'   => $this->quantity,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
        ];
    }
}
