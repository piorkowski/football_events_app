<?php

declare(strict_types=1);

namespace App\Application\MessageBus;

interface QueryHandlerInterface
{
    public function handle(QueryInterface $query): mixed;
}
