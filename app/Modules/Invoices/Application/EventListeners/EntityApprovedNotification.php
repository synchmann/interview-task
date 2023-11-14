<?php

namespace App\Modules\Invoices\Application\EventListeners;

use App\Modules\Approval\Api\Events\EntityApproved;
use App\Modules\Invoices\Application\Repositories\InvoiceRepository;

class EntityApprovedNotification
{

    /**
     * @param InvoiceRepository $invoiceRepository
     */
    public function __construct(
        private InvoiceRepository $invoiceRepository
    ) {
    }

    /**
     * Handle the event.
     */
    public function handle(EntityApproved $event): void
    {
        $this->invoiceRepository->updateStatus($event->approvalDto);
    }
}
