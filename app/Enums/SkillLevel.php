<?php

declare(strict_types=1);

namespace App\Enums;

enum SkillLevel: string
{
    case Beginner     = 'beginner';
    case Intermediate = 'intermediate';
    case Advanced     = 'advanced';
    case Expert       = 'expert';

    public static function fromString(string $level): ?SkillLevel
    {
        return match (strtolower($level)) {
            'beginner', 'junior' => self::Beginner,
            'intermediate', 'mid-level' => self::Intermediate,
            'advanced', 'senior' => self::Advanced,
            'expert', 'master' => self::Expert,
            default => null,
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Beginner     => 'bg-blue-100 text-blue-800',
            self::Intermediate => 'bg-yellow-100 text-yellow-800',
            self::Advanced     => 'bg-green-100 text-green-800',
            self::Expert       => 'bg-red-100 text-red-800',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::Beginner     => 'Beginner',
            self::Intermediate => 'Intermediate',
            self::Advanced     => 'Advanced',
            self::Expert       => 'Expert',
        };
    }
}
