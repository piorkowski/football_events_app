<?php

declare(strict_types=1);

namespace App\UI\Action;

use App\Application\MessageBus\CommandBusInterface;
use App\Application\MessageBus\QueryBusInterface;
use App\Application\Query\GetMatchStatisticsQuery;
use App\Application\Query\GetTeamStatisticsQuery;
use App\UI\DTO\MatchStatisticsDTO;
use App\UI\DTO\TeamStatisticsDTO;
use App\UI\Request\GetStatisticsRequest;
use App\UI\Response\MatchStatisticsResponse;
use App\UI\Response\TeamStatisticsResponse;
use Psr\Log\LoggerInterface;

class StatisticAction
{
    public function __construct(
        private LoggerInterface     $logger,
        private QueryBusInterface   $queryBus
    ) {}

    public function __invoke(GetStatisticsRequest $request): MatchStatisticsResponse|TeamStatisticsResponse {
        try {
            switch ($request) {
                case $request->teamId !== null: {
                    $this->logger->info('Team statistics requested');
                    $this->queryBus->ask(new GetTeamStatisticsQuery($this->mapRequestToTeamStatsDTO($request)));
                }
                case $request->teamId === null: {
                    $this->logger->info('Match statistics requested');
                    $this->queryBus->ask(new GetMatchStatisticsQuery($this->mapRequestToMatchStatsDTO($request)));
                }
                default: {}
            }
        } catch (\Throwable $e) {

        }
    }

    private function mapRequestToTeamStatsDTO(GetStatisticsRequest $request): TeamStatisticsDTO {
        return new TeamStatisticsDTO($request->teamId, $request->matchId);
    }

    private function mapRequestToMatchStatsDTO(GetStatisticsRequest $request): MatchStatisticsDTO
    {
        return new MatchStatisticsDTO($request->matchId);
    }
}
