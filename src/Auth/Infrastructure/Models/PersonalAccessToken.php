<?php

declare(strict_types=1);

namespace Auth\Infrastructure\Models;

use Auth\Domain\Contracts\IPersonalAccessToken;
use Carbon\Carbon;
use Shared\Enum\TokenMorph;
use Shared\Enum\UserType;
use Shared\Utils\ValueObjects\Uuid;

class PersonalAccessToken extends \Laravel\Sanctum\PersonalAccessToken implements IPersonalAccessToken
{
    public static function morphToUserType(TokenMorph $morph): UserType
    {
        switch ($morph) {
            case TokenMorph::STUDENT:
                return UserType::STUDENT;
        }
        throw new \Exception();
    }

    public static function userTypeToMorph(UserType $type): TokenMorph
    {
        switch ($type) {
            case UserType::STUDENT:
                return TokenMorph::STUDENT;
        }
        throw new \Exception();
    }

    public function getKey(): string
    {
        return (string) parent::getKey();
    }

    public function getTokenableId(): Uuid
    {
        return Uuid::fromString($this->tokenable_id);
    }

    public function getRefreshExpiresAt(): ?Carbon
    {
        return $this->refresh_expires_at;
    }

    public function getUserType(): UserType
    {
        return self::morphToUserType(TokenMorph::from($this->tokenable_type));
    }
}
