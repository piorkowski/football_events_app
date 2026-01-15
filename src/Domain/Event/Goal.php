<?php
declare(strict_types=1);

namespace App\Domain\Event;

use App\Domain\Match\VO\MatchId;
use App\Domain\Player\VO\PlayerId;
use App\Domain\Team\VO\TeamId;
use DateTimeInterface;
use DateTimeImmutable;
final class Goal extends MatchEvent
{
    public function __construct(
        public MatchId $matchId,
        public TeamId $teamId,
        public PlayerId $scorerId,
        public int $minute,
        public int $second,
        public ?PlayerId $assistId = null,
        public ?DateTimeInterface $timestamp = new DateTimeImmutable()
    ) {
        parent::__construct($matchId, $teamId, $minute, $second, $timestamp);
    }

    public function type(): EventType
    {
        return EventType::GOAL;
    }

    public function scorerId(): PlayerId
    {
        return $this->scorerId;
    }

    public function assistId(): ?PlayerId
    {
        return $this->assistId;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type()->value,
            'match_id' => $this->matchId->value(),
            'team_id' => $this->teamId->value(),
            'scorer_id' => $this->scorerId->value(),
            'assist_id' => $this->assistId?->value(),
            'minute' => $this->minute,
            'second' => $this->second,
            'timestamp' => $this->timestamp->format('Y-m-d H:i:s')
        ];
    }
}