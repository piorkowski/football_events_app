<?php
declare(strict_types=1);

namespace App\Application\EventBus;

use App\Domain\Event\MatchEvent;

interface EventBusInterface
{
    public function publish(MatchEvent $event): void;

    public function subscribe(callable $listener): void;
}