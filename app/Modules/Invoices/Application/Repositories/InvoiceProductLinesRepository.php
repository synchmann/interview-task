<?php

namespace App\Modules\Invoices\Application\Repositories;

use Illuminate\Support\Facades\DB;
use App\Modules\Invoices\Application\Mappers\InvoiceProductLinesMapper;
use App\Modules\Invoices\Domain\Repositories\InvoiceProductLinesRepositoryInterface;


class InvoiceProductLinesRepository implements InvoiceProductLinesRepositoryInterface
{
    public function __construct(
        private InvoiceProductLinesMapper $productLinesMapper
    ) {
    }

    /**
     * @param string $id
     * @return array
     */
    public function findByInvoiceId(string $id): array
    {
        $invoiceProductLines = DB::table('invoice_product_lines')
            ->where("invoice_id", "=", $id)
            ->join('products', 'invoice_product_lines.product_id', '=', 'products.id')
            ->get();

        $producLines = [];
        foreach ($invoiceProductLines as $invoiceProductLine) {
            $producLines[] = $this->productLinesMapper->fromDB($invoiceProductLine);
        }

        return $producLines;
    }
}
