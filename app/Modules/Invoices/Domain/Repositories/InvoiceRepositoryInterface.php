<?php

namespace App\Modules\Invoices\Domain\Repositories;

use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Invoices\Domain\Model\Invoice;

interface InvoiceRepositoryInterface
{
    public function findById(string $id): Invoice;
    public function updateStatus(ApprovalDto $invoice): void;
}
