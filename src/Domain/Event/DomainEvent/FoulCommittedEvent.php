<?php
declare(strict_types=1);

namespace App\Domain\Event\DomainEvent;

use App\Domain\Match\VO\MatchId;
use App\Domain\Player\VO\PlayerId;
use App\Domain\Shared\DomainEventInterface;
use App\Domain\Team\VO\TeamId;
use DateTimeImmutable;

class FoulCommittedEvent implements DomainEventInterface
{
    public function __construct(
        public MatchId $matchId,
        public TeamId $teamId,
        private readonly DateTimeImmutable $occurredOn = new DateTimeImmutable()
    ) {}

    public function occurredOn(): DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
