<?php

declare(strict_types=1);

namespace App\UI\Request;

final readonly class GetStatisticsRequest
{
    public function __construct(
        public string $matchId,
        public string $teamId
    ) {}

    public static function fromQueryParams(array $params): self
    {
        if (!isset($params['match_id'])) {
            throw new \InvalidArgumentException('match_id is required');
        }

        if (!isset($params['team_id'])) {
            throw new \InvalidArgumentException('team_id is required');
        }

        return new self(
            matchId: $params['match_id'],
            teamId: $params['team_id']
        );
    }
}
