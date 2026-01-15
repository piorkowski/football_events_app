<?php
declare(strict_types=1);

namespace App\Application\Command\Handler;

use App\Application\Command\NotifyClientsCommand;
use App\Infrastructure\MessageBus\CommandHandlerInterface;
use App\Infrastructure\MessageBus\CommandInterface;

class NotifyClientsHandler implements CommandHandlerInterface
{
    public function __construct()
    {
    }

    public function handle(NotifyClientsCommand $command): void
    {

    }

}