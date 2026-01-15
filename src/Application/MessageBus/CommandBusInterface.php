<?php

namespace App\Application\MessageBus;

interface CommandBusInterface
{
    public function register(string $commandClass, CommandHandlerInterface $handler): void;
    public function dispatch(CommandInterface $command): void;
}
