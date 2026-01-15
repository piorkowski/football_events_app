<?php
declare(strict_types=1);

namespace App\Application\Query\Handler;

use App\Application\Query\GetMatchStatisticsQuery;
use App\Domain\Match\VO\MatchId;
use App\Domain\Statistics\StatisticsRepositoryInterface;
use App\Infrastructure\MessageBus\QueryHandlerInterface;

final readonly class GetMatchStatisticsHandler implements QueryHandlerInterface
{
    public function __construct(
        private StatisticsRepositoryInterface $statisticsRepository
    ) {}

    public function handle(GetMatchStatisticsQuery $query): array
    {
        $matchId = new MatchId($query->matchStatisticsDTO->matchId);
        $statistics = $this->statisticsRepository->findByMatchId($matchId);

        if ($statistics === null) {
            return [
                'match_id' => $query->matchStatisticsDTO->matchId,
                'teams' => []
            ];
        }

        return $statistics->toArray();
    }
}