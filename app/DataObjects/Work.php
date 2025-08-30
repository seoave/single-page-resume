<?php

declare(strict_types=1);

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Work
{
    /**
     * @param string[] $highlights
     */
    public function __construct(
        public string $name = '',
        public string $position = '',
        public string $url = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $summary = '',
        public array $highlights = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            position: $data['position'] ?? '',
            url: $data['url'] ?? '',
            startDate: isset($data['startDate']) ? new Carbon($data['startDate']) : null,
            endDate: isset($data['endDate']) ? new Carbon($data['endDate']) : null,
            summary: $data['summary'] ?? '',
            highlights: is_array($data['highlights'] ?? null) ? $data['highlights'] : [],
        );
    }
}
