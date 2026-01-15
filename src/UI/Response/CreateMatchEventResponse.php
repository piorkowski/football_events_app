<?php

declare(strict_types=1);

namespace App\UI\Response;

use App\Domain\Event\MatchEvent;
use JsonException;

final readonly class CreateMatchEventResponse
{
    public function __construct(private ?MatchEvent $event) {}

    public function __invoke(): string
    {
        try {
            return json_encode([
                'status' => 'success',
                'message' => 'Event saved successfully',
                'event' => $this->event?->toArray(),
            ], JSON_THROW_ON_ERROR);
        } catch (\Throwable $e) {
            return json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], JSON_THROW_ON_ERROR);
        }
    }
}
