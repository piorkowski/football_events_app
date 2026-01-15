<?php
declare(strict_types=1);

namespace App\Application\Command\Handler;

use App\Application\Command\NotifyClientsCommand;
use App\Application\MessageBus\CommandHandlerInterface;

class NotifyClientsHandler implements CommandHandlerInterface
{
    public function __construct(
        private LoggerInterface $logger
        private
    )
    {
    }

    public function handle(NotifyClientsCommand $command): void
    {

    }

}
