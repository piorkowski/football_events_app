<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Client\Repository\ClientReadRepositoryInterface;

class ClientRepository implements ClientReadRepositoryInterface
{
    public function activeClientsForNotification(): array
    {
        // TODO: Implement activeClientsForNotification() method.
    }
}
