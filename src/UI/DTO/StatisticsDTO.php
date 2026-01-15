<?php

declare(strict_types=1);

namespace App\UI\DTO;

abstract readonly class StatisticsDTO
{
    public function __construct(
        public string $matchId,
    ) {}
}
