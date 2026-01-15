<?php

declare(strict_types=1);

namespace App\Infrastructure\MessageBus;

use App\Application\MessageBus\QueryBusInterface;
use App\Application\MessageBus\QueryHandlerInterface;
use App\Application\MessageBus\QueryInterface;
use RuntimeException;

final class QueryBus implements QueryBusInterface
{
    private array $handlers = [];

    public function register(string $queryClass, QueryHandlerInterface $handler): void
    {
        $this->handlers[$queryClass] = $handler;
    }

    public function ask(QueryInterface $query): mixed
    {
        $queryClass = get_class($query);

        if (!isset($this->handlers[$queryClass])) {
            throw new RuntimeException("No handler registered for query: {$queryClass}");
        }

        return $this->handlers[$queryClass]->handle($query);
    }
}
