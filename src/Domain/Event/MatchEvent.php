<?php
declare(strict_types=1);

namespace App\Domain\Event;

use App\Domain\Match\VO\MatchId;
use App\Domain\Team\VO\TeamId;
use DateTimeInterface;

abstract class MatchEvent
{
    public function __construct(
        protected MatchId $matchId,
        protected TeamId $teamId,
        protected int $minute,
        protected int $second,
        protected ?DateTimeInterface $timestamp = null
    )
    {
    }

    abstract public function type(): EventType;

    public function matchId(): MatchId
    {
        return $this->matchId;
    }

    public function teamId(): TeamId
    {
        return $this->teamId;
    }

    public function minute(): int
    {
        return $this->minute;
    }

    public function second(): int
    {
        return $this->second;
    }

    abstract public function toArray(): array;
}