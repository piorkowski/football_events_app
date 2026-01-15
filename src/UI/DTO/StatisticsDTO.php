<?php
declare(strict_types=1);

namespace App\UI\DTO;

readonly abstract class StatisticsDTO
{
        public function __construct(
            public string $matchId,
        )
        {
        }
}