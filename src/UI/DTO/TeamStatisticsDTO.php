<?php
declare(strict_types=1);

namespace App\UI\DTO;

readonly final class TeamStatisticsDTO extends StatisticsDTO
{
        public function __construct(
            public string $matchId,
            public string $teamId,
        )
        {
            parent::__construct($matchId);
        }
}