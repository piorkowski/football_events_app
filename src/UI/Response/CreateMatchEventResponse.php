<?php
declare(strict_types=1);

namespace App\UI\Response;

use App\Domain\Event\MatchEvent;

readonly final class CreateMatchEventResponse
{
    public function __construct(private MatchEvent $event)
    {
    }

    public function __invoke(): string
    {
        return json_encode([
            'status' => 'success',
            'message' => 'Event saved successfully',
            'event' => $this->event->toArray(),
        ]);
    }
}