<?php

declare(strict_types=1);

namespace Auth\Presentation\Http\Resources;

use Auth\Domain\Contracts\ILoginResult;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property ILoginResult $resource
 */
class LoginResponse extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'id' => (string) $this->resource->getUser()->getId(),
                'email' => $this->resource->getUser()->getUniqueIdentity(),
            ],
            'token' => $this->resource->getToken()
        ];
    }
}
