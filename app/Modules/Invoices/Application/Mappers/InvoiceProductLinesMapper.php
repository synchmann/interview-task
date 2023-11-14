<?php

namespace App\Modules\Invoices\Application\Mappers;

use App\Modules\Invoices\Domain\Model\Entities\ProductLine;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\CreatedAt;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\UpdatedAt;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\Uuid;
use App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine\Name;
use App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine\Price;
use App\Modules\Invoices\Domain\Model\ValueObjects\ProductLine\Quantity;

class InvoiceProductLinesMapper
{
    /**
     * @param \stdClass $productLine
     * @return ProductLine
     */
    public function fromDB(\stdClass $productLine): ProductLine
    {
        return new ProductLine(
            new Uuid($productLine->id),
            new Name($productLine->name),
            new Price($productLine->price),
            new Quantity($productLine->quantity),
            new CreatedAt($productLine->created_at),
            new UpdatedAt($productLine->updated_at)
        );
    }
}
