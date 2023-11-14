<?php

declare(strict_types=1);

namespace App\Modules\Approval\Application\Mappers;

use App\Domain\Enums\StatusEnum;
use Illuminate\Http\Request;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Approval\Application\Exceptions\InvalidStatusException;
use Ramsey\Uuid\Uuid;

class ApprovalMapper
{
    /**
     * @param string $id
     * @param Request $request
     * @return ApprovalDto
     */
    public static function mapToDtoFromRequest(string $id, Request $request): ApprovalDto
    {
        $status = match ($request->string('status')->toString()) {
            StatusEnum::DRAFT->value => StatusEnum::DRAFT,
            StatusEnum::APPROVED->value => StatusEnum::APPROVED,
            StatusEnum::REJECTED->value => StatusEnum::REJECTED,
            default => throw new InvalidStatusException($request->string('status')->toString()),
        };

        return new ApprovalDto(
            UUid::fromString($id),
            $status,
            "invoices"
        );
    }
}
