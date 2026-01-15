<?php
declare(strict_types=1);

namespace App\Domain\Event\Repository;

use App\Domain\Event\MatchEvent;
use App\Domain\Match\VO\MatchId;

interface MatchEventProjectionRepositoryInterface
{
    public function save(MatchEvent $event): void;
}