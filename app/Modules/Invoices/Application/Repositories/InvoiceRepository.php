<?php

namespace App\Modules\Invoices\Application\Repositories;

use App\Modules\Approval\Api\Dto\ApprovalDto;
use Illuminate\Support\Facades\DB;
use App\Modules\Invoices\Domain\Model\Invoice;
use App\Modules\Invoices\Domain\Repositories\InvoiceRepositoryInterface;
use App\Modules\Invoices\Application\Exceptions\InvoiceNotFoundException;
use App\Modules\Invoices\Application\Mappers\InvoiceMapper;

class InvoiceRepository implements InvoiceRepositoryInterface
{
    public function __construct(
        private InvoiceMapper $invoiceMapper
    ) {
    }

    public function findById(string $id): Invoice
    {
        $invoice = DB::table('invoices')
            ->select("companies.*", "invoices.*", "invoices.id as invoice_id")
            ->where("invoices.id", "=", $id)
            ->join('companies', 'invoices.company_id', '=', 'companies.id')
            ->first();
        if (!$invoice) {
            throw new InvoiceNotFoundException();
        }

        return $this->invoiceMapper->fromDB($invoice, true);
    }

    /**
     * @param ApprovalDto $approvalDto
     * @return void
     */
    public function updateStatus(ApprovalDto $approvalDto): void
    {
        DB::table('invoices')
            ->where('id', $approvalDto->id->toString())
            ->update(['status' => $approvalDto->status->value]);
    }
}
