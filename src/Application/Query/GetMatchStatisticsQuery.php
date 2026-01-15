<?php
declare(strict_types=1);

namespace App\Application\Query;

use App\Infrastructure\MessageBus\QueryInterface;
use App\UI\DTO\MatchStatisticsDTO;

final class GetMatchStatisticsQuery implements QueryInterface
{
    public function __construct(public MatchStatisticsDTO $matchStatisticsDTO)
    {
    }
}