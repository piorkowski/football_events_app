<?php
declare(strict_types=1);

namespace App\Domain\Shared;

abstract class AggregateRoot
{
    private array $domainEvents = [];

    protected function raise(DomainEventInterface $event): void
    {
        $this->domainEvents[] = $event;
    }

    public function pullDomainEvents(): array
    {
        $events = $this->domainEvents;
        $this->domainEvents = [];
        return $events;
    }
}
