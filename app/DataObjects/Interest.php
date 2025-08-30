<?php

declare(strict_types=1);

namespace App\DataObjects;

readonly class Interest
{
    /**
     * @param string[] $keywords
     */
    public function __construct(
        public string $name = '',
        public array $keywords = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            keywords: is_array($data['keywords'] ?? null) ? $data['keywords'] : [],
        );
    }
}
