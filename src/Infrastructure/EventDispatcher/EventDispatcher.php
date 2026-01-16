<?php

declare(strict_types=1);

namespace App\Infrastructure\EventDispatcher;

use App\Application\EventHandler\DomainEventHandlerInterface;
use App\Domain\Shared\DomainEventInterface;

final class EventDispatcher
{
    /** @var array<string, DomainEventHandlerInterface[]> */
    private array $handlers = [];

    public function subscribe(string $eventClass, DomainEventHandlerInterface $handler): void
    {
        $this->handlers[$eventClass][] = $handler;
    }

    public function dispatch(DomainEventInterface $event): void
    {
        $eventClass = $event::class;

        if (!isset($this->handlers[$eventClass])) {
            return;
        }

        foreach ($this->handlers[$eventClass] as $handler) {
            $handler->handle($event);
        }
    }

    /**
     * @param DomainEventInterface[] $events
     */
    public function dispatchAll(array $events): void
    {
        foreach ($events as $event) {
            $this->dispatch($event);
        }
    }
}
