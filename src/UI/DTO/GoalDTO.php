<?php
declare(strict_types=1);

namespace App\UI\DTO;

abstract class GoalDTO
{
    public function __construct(
            public string $type,
            public string $matchId,
            public string $teamId,
            public int $minute,
            public int $second,
            public string $scorerId,
            public ?string $assistId = null,
        )
        {
        }
}