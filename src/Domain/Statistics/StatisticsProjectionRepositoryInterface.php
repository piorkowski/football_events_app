<?php
declare(strict_types=1);

namespace App\Domain\Statistics;

use App\Domain\Match\VO\MatchId;
use App\Domain\Team\VO\TeamId;

interface StatisticsProjectionRepositoryInterface
{
    public function save(MatchStatistics $statistics): void;
}