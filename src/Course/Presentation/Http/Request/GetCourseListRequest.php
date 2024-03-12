<?php

declare(strict_types=1);

namespace Course\Presentation\Http\Request;

use Course\Domain\Contracts\IGetCourseListRequest;
use Illuminate\Http\Request;

class GetCourseListRequest extends Request implements IGetCourseListRequest
{
    public function rules(): array
    {
        return [
            'page' => ['required', 'integer'],
            'per_page' => ['required', 'integer']
        ];
    }

    public function getSearchKeyword(): ?string
    {
        return $this->input('search') ?? null;
    }

    public function getPage(): int
    {
        return (int) $this->input('page');
    }

    public function getPerPage(): int
    {
        return (int) $this->input('per_page');
    }
}
