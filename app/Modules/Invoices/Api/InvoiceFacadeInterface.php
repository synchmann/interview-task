<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Api;

interface InvoiceFacadeInterface
{
    public function show(string $id);
}
