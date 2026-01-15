<?php

namespace App\Infrastructure\MessageBus;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $command): void;
}