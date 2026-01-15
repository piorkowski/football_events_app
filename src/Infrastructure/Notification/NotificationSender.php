<?php

namespace App\Infrastructure\Notification;

use App\Domain\Client\Client;
use App\Domain\Event\VO\MatchEventId;

abstract class NotificationSender
{
    public function send(Client $client, MatchEventId $eventId): void
    {
        echo "Sending notification to {$client->id()->value()} about event {$eventId->value()}";
    }
}
