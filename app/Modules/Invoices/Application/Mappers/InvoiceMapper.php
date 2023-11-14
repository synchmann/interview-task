<?php

namespace App\Modules\Invoices\Application\Mappers;

use App\Modules\Invoices\Domain\Model\Entities\Company;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\IssueDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\DueDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\Status;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\InvoiceNumber;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\CreatedAt;
use App\Modules\Invoices\Domain\Model\Invoice;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\City;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Email;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Name;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Phone;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Street;
use App\Modules\Invoices\Domain\Model\ValueObjects\Company\Zip;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\UpdatedAt;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\Uuid;

class InvoiceMapper
{
    /**
     * @param \stdClass $invoice
     * @param boolean $withCompany
     * @return Invoice
     */
    public function fromDB(\stdClass $invoice, bool $withCompany = false): Invoice
    {
        $company = null;
        if ($withCompany == true) {
            $company = new Company(
                new Uuid($invoice->company_id),
                new Name($invoice->name),
                new Street($invoice->street),
                new City($invoice->city),
                new Zip($invoice->zip),
                new Phone($invoice->phone),
                new Email($invoice->email)
            );
        }

        return new Invoice(
            id: new Uuid($invoice->invoice_id),
            issueDate: new IssueDate($invoice->date),
            dueDate: new DueDate($invoice->due_date),
            status: new Status($invoice->status),
            number: new InvoiceNumber($invoice->number),
            createdAt: new CreatedAt($invoice->created_at),
            updatedAt: new UpdatedAt($invoice->updated_at),
            company: $company
        );
    }
}
