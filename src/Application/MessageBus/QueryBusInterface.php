<?php

declare(strict_types=1);

namespace App\Application\MessageBus;

interface QueryBusInterface
{
    public function register(string $queryClass, QueryHandlerInterface $handler): void;
    public function ask(QueryInterface $query): mixed;
}
