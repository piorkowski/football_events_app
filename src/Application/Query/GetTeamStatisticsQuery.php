<?php

declare(strict_types=1);

namespace App\Application\Query;

use App\Application\MessageBus\QueryInterface;
use App\UI\DTO\TeamStatisticsDTO;

final class GetTeamStatisticsQuery implements QueryInterface
{
    public function __construct(public TeamStatisticsDTO $teamStatisticsDTO) {}
}
