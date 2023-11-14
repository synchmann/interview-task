<?php

namespace App\Modules\Approval\Application\Exceptions;

final class InvalidStatusException extends \Exception
{
    /**
     * @param string $status
     */
    public function __construct(string $status)
    {
        parent::__construct(sprintf('Invalud status: %s', $status));
    }
}
