<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Application;

use App\Modules\Invoices\Api\InvoiceFacadeInterface;
use App\Modules\Invoices\Domain\Model\Invoice;
use App\Modules\Invoices\Domain\Repositories\InvoiceRepositoryInterface;
use App\Modules\Invoices\Domain\Repositories\InvoiceProductLinesRepositoryInterface;

final readonly class InvoiceFacade implements InvoiceFacadeInterface
{
    /**
     * @param InvoiceRepositoryInterface $invoiceRepository
     * @param InvoiceProductLinesRepositoryInterface $invoiceProductLinesRepository
     */
    public function __construct(
        private InvoiceRepositoryInterface $invoiceRepository,
        private InvoiceProductLinesRepositoryInterface $invoiceProductLinesRepository
    ) {
    }

    /**
     * @param string $id
     * @return Invoice
     */
    public function show(string $id): Invoice
    {
        $invoice = $this->invoiceRepository->findById($id);
        $invoiceProducts = $this->invoiceProductLinesRepository->findByInvoiceId($invoice->getId());
        $invoice->addProducts($invoiceProducts);

        return $invoice;
    }
}
