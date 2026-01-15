<?php

declare(strict_types=1);

namespace App\UI\Request;

class CreateEventRequest
{
    public function __construct(
        public string $type,
        public string $player,
        public string $teamId,
        public string $matchId,
        public int $minute,
        public int $second,
        public ?string $assistPlayerId = null,
        public ?string $scoredPlayerId = null,
        public ?string $affectedPlayerId = null
    ) {}
}
