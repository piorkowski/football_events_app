<?php

declare(strict_types=1);

namespace App\UI\DTO;

final readonly class MatchStatisticsDTO extends StatisticsDTO
{
    public function __construct(
        public string $matchId,
    ) {
        parent::__construct($matchId);
    }
}
