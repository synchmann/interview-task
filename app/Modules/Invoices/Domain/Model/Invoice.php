<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Domain\Model;

use App\Modules\Invoices\Domain\Model\Entities\Company;
use App\Modules\Invoices\Domain\Model\Entities\ProductLine;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\IssueDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\DueDate;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\Status;
use App\Modules\Invoices\Domain\Model\ValueObjects\Invoice\InvoiceNumber;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\CreatedAt;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\UpdatedAt;
use App\Modules\Invoices\Domain\Model\ValueObjects\Common\Uuid;

class Invoice //extends AggregateRoot
{
    /**
     * Undocumented function
     *
     * @param string $id
     * @param IssueDate $issueDate
     * @param DueDate $dueDate
     * @param Status $status
     * @param InvoiceNumber $number
     * @param CreatedAt $createdAt
     * @param UpdatedAt $updatedAt
     * @param Company|null $company
     * @param ProductLine[] $productLines
     */
    public function __construct(
        private readonly Uuid $id,
        private readonly IssueDate $issueDate,
        private readonly DueDate $dueDate,
        private readonly Status $status,
        private readonly InvoiceNumber $number,
        private readonly CreatedAt $createdAt,
        private readonly UpdatedAt $updatedAt,
        private readonly ?Company $company,
        private array $productLines = [],
    ) {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return (string) $this->id;
    }

    /**
     * @param array $productLines
     * @return void
     */
    public function addProducts(array $productLines): void
    {
        $this->productLines = $productLines;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->productLines as $productLine) {
            $total += $productLine->getPrice() * $productLine->getQuantity();
        }

        return  round($total, 2);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'fiscal_name' => $this->issueDate,
            'social_name' => $this->dueDate,
            'status' => $this->status,
            'number' => $this->number,
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'total' => $this->getTotal(),
            'company' => $this->company?->toArray() ?? [],
            'products_lines' => $this->productLines,
        ];
    }
}
