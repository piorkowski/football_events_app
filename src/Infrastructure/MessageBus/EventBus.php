<?php

declare(strict_types=1);

namespace App\Infrastructure\MessageBus;

use App\Application\MessageBus\EventBusInterface;
use App\Domain\Event\MatchEvent;

final class EventBus implements EventBusInterface
{
    private array $listeners = [];

    public function publish(MatchEvent $event): void
    {
        foreach ($this->listeners as $listener) {
            $listener($event);
        }
    }

    public function subscribe(callable $listener): void
    {
        $this->listeners[] = $listener;
    }
}
