<?php

namespace App\Presentation\Http;

use Illuminate\Http\JsonResponse;
use App\Infrastructure\Controller;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Application\Mappers\ApprovalMapper;
use App\Modules\Invoices\Api\InvoiceFacadeInterface;
use Symfony\Component\HttpFoundation\Response;
use App\Modules\Invoices\Application\Exceptions\InvoiceNotFoundException;
use Illuminate\Http\Request;
use LogicException;

class InvoiceController extends Controller
{
    /**
     * @param InvoiceFacadeInterface $invoiceFacade
     */
    public function __construct(
        protected InvoiceFacadeInterface $invoiceFacade,
        protected ApprovalFacadeInterface $approvalFacade
    ) {
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        try {
            return response()->json(
                $this->invoiceFacade->show($id)->toArray(),
                200
            );
        } catch (InvoiceNotFoundException $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @param string $id
     * @param Request $request
     * @return JsonResponse
     */
    public function changeStatus(string $id, Request $request): JsonResponse
    {
        try {
            $invoiceApprovalDto = ApprovalMapper::mapToDtoFromRequest($id, $request);
            $this->approvalFacade->changeStatus($invoiceApprovalDto);

            return response()->json(
                ['updated' => true],
                200
            );
        } catch (LogicException $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Exception $e) {
            return response()->json(["error" => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
