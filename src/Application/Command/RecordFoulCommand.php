<?php
declare(strict_types=1);

namespace App\Application\Command;

use App\UI\DTO\FoulDTO;

class RecordFoulCommand
{
    public function __construct(public FoulDTO $eventDTO)
    {
    }
}