<?php

declare(strict_types=1);

namespace App\DataObjects;

readonly class Skill
{
    /**
     * @param string[] $keywords
     */
    public function __construct(
        public string $name = '',
        public string $level = '',
        public array $keywords = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            level: $data['level'] ?? '',
            keywords: is_array($data['keywords'] ?? null) ? $data['keywords'] : [],
        );
    }
}
