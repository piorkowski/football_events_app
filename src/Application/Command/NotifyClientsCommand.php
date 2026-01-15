<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Application\MessageBus\CommandInterface;
use App\Domain\Event\VO\MatchEventId;

class NotifyClientsCommand implements CommandInterface
{
    public function __construct(
        public MatchEventId $matchEventId
    ) {}

}
