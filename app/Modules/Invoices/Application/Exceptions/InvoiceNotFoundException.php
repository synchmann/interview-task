<?php

namespace App\Modules\Invoices\Application\Exceptions;

use App\Domain\Exceptions\EntityNotFoundException;

final class InvoiceNotFoundException extends EntityNotFoundException
{
    /**
     * @param string $message
     */
    public function __construct(string $message = 'Invoice not found')
    {
        parent::__construct($message);
    }
}
