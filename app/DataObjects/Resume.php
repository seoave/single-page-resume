<?php

declare(strict_types=1);

namespace App\DataObjects;

readonly class Resume
{
    /**
     * @param Work[]        $work
     * @param Volunteer[]   $volunteer
     * @param Education[]   $education
     * @param Award[]       $awards
     * @param Certificate[] $certificates
     * @param Publication[] $publications
     * @param Skill[]       $skills
     * @param Language[]    $languages
     * @param Interest[]    $interests
     * @param Reference[]   $references
     * @param Project[]     $projects
     */
    public function __construct(
        public Basics $basics = new Basics(),
        public array $work = [],
        public array $volunteer = [],
        public array $education = [],
        public array $awards = [],
        public array $certificates = [],
        public array $publications = [],
        public array $skills = [],
        public array $languages = [],
        public array $interests = [],
        public array $references = [],
        public array $projects = [],
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            basics: isset($data['basics']) && is_array($data['basics'])
                ? Basics::fromArray($data['basics'])
                : new Basics(),
            work: array_map(
                static fn(array $w) => Work::fromArray($w),
                is_array($data['work'] ?? null) ? $data['work'] : []
            ),
            volunteer: array_map(
                static fn(array $v) => Volunteer::fromArray($v),
                is_array($data['volunteer'] ?? null) ? $data['volunteer'] : []
            ),
            education: array_map(
                static fn(array $e) => Education::fromArray($e),
                is_array($data['education'] ?? null) ? $data['education'] : []
            ),
            awards: array_map(
                static fn(array $a) => Award::fromArray($a),
                is_array($data['awards'] ?? null) ? $data['awards'] : []
            ),
            certificates: array_map(
                static fn(array $c) => Certificate::fromArray($c),
                is_array($data['certificates'] ?? null) ? $data['certificates'] : []
            ),
            publications: array_map(
                static fn(array $p) => Publication::fromArray($p),
                is_array($data['publications'] ?? null) ? $data['publications'] : []
            ),
            skills: array_map(
                static fn(array $s) => Skill::fromArray($s),
                is_array($data['skills'] ?? null) ? $data['skills'] : []
            ),
            languages: array_map(
                static fn(array $l) => Language::fromArray($l),
                is_array($data['languages'] ?? null) ? $data['languages'] : []
            ),
            interests: array_map(
                static fn(array $i) => Interest::fromArray($i),
                is_array($data['interests'] ?? null) ? $data['interests'] : []
            ),
            references: array_map(
                static fn(array $r) => Reference::fromArray($r),
                is_array($data['references'] ?? null) ? $data['references'] : []
            ),
            projects: array_map(
                static fn(array $p) => Project::fromArray($p),
                is_array($data['projects'] ?? null) ? $data['projects'] : []
            ),
        );
    }
}
