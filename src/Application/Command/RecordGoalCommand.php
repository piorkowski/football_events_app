<?php
declare(strict_types=1);

namespace App\Application\Command;

use App\UI\DTO\GoalDTO;

class RecordGoalCommand
{
    public function __construct(public GoalDTO $eventDTO)
    {
    }
}