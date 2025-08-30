<?php

declare(strict_types=1);

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Certificate
{
    public function __construct(
        public string $name = '',
        public ?Carbon $date = null,
        public string $issuer = '',
        public string $url = '',
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            date: isset($data['date']) ? new Carbon($data['date']) : null,
            issuer: $data['issuer'] ?? '',
            url: $data['url'] ?? '',
        );
    }
}
