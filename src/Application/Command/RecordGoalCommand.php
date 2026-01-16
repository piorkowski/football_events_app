<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Application\MessageBus\CommandInterface;
use App\UI\DTO\GoalDTO;

class RecordGoalCommand implements CommandInterface
{
    public function __construct(public GoalDTO $eventDTO) {}
}
