<?php

declare(strict_types=1);

namespace App\Application\Command;

use App\Application\MessageBus\CommandInterface;
use App\UI\DTO\FoulDTO;

class RecordFoulCommand implements CommandInterface
{
    public function __construct(public FoulDTO $eventDTO) {}
}
