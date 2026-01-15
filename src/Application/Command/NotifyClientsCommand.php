<?php
declare(strict_types=1);

namespace App\Application\Command;

use App\Domain\Event\VO\MatchEventId;
use App\Infrastructure\MessageBus\CommandInterface;

class NotifyClientsCommand implements CommandInterface
{
    public function __construct(
        public MatchEventId $matchEventId
    )
    {
    }

}