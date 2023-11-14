<?php

namespace App\Modules\Invoices\Domain\Repositories;

interface InvoiceProductLinesRepositoryInterface
{
    public function findByInvoiceId(string $id): array;
}
