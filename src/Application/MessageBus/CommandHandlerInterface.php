<?php

namespace App\Application\MessageBus;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $command): mixed;
}
