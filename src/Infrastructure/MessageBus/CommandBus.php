<?php

declare(strict_types=1);

namespace App\Infrastructure\MessageBus;

use App\Application\MessageBus\CommandBusInterface;
use App\Application\MessageBus\CommandHandlerInterface;
use App\Application\MessageBus\CommandInterface;
use RuntimeException;

final class CommandBus implements CommandBusInterface
{
    private array $handlers = [];

    public function register(string $commandClass, CommandHandlerInterface $handler): void
    {
        $this->handlers[$commandClass] = $handler;
    }

    public function dispatch(CommandInterface $command): mixed
    {
        $commandClass = get_class($command);

        if (!isset($this->handlers[$commandClass])) {
            throw new RuntimeException("No handler registered for command: {$commandClass}");
        }

        return $this->handlers[$commandClass]->handle($command);
    }
}
