<?php

namespace App\Modules\Invoices\Application\EventListeners;

use App\Modules\Approval\Api\Events\EntityRejected;
use App\Modules\Invoices\Application\Repositories\InvoiceRepository;

class EntityRejectedNotification
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
    public function handle(EntityRejected $event): void
    {
        $this->invoiceRepository->updateStatus($event->approvalDto);
    }
}
