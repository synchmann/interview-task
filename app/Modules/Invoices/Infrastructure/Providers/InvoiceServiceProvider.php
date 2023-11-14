<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Infrastructure\Providers;

use App\Modules\Invoices\Api\InvoiceFacadeInterface;
use App\Modules\Invoices\Application\InvoiceFacade;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use App\Modules\Invoices\Domain\Repositories\InvoiceRepositoryInterface;
use App\Modules\Invoices\Application\Repositories\InvoiceRepository;
use App\Modules\Invoices\Application\Repositories\InvoiceProductLinesRepository;
use App\Modules\Invoices\Domain\Repositories\InvoiceProductLinesRepositoryInterface;

class InvoiceServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->scoped(InvoiceRepositoryInterface::class, InvoiceRepository::class);
        $this->app->scoped(InvoiceProductLinesRepositoryInterface::class, InvoiceProductLinesRepository::class);
        $this->app->bind(InvoiceFacadeInterface::class, InvoiceFacade::class);
    }

    /** @return array<class-string> */
    public function provides(): array
    {
        return [
            InvoiceRepositoryInterface::class,
            InvoiceProductLinesRepositoryInterface::class,
            InvoiceFacadeInterface::class,
        ];
    }
}
