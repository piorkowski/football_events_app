<?php
declare(strict_types=1);

namespace App\UI\Action;

use App\Application\Command\RecordFoulCommand;
use App\Application\MessageBus\CommandBusInterface;
use App\UI\DTO\FoulDTO;
use App\UI\DTO\GoalDTO;
use App\UI\Request\CreateEventRequest;
use App\UI\Response\CreateMatchEventResponse;
use Psr\Log\LoggerInterface;

class EventAction
{
    public function __construct(
        private LoggerInterface     $logger,
        private CommandBusInterface $commandBus
    )
    {
    }

    public function __invoke(CreateEventRequest $request): CreateMatchEventResponse
    {
        try {
            switch ($request) {
                case $request->type === 'goal':
                {
                    $this->logger->info('Goal recording');
                    $this->commandBus->dispatch(new RecordGoalCommand($this->mapToGoalDTO($request));
                }
                case $request->type === 'foul':
                {
                    $this->logger->info('Foul recording');
                    $this->commandBus->dispatch(new RecordFoulCommand($this->mapToFoulDTO($request));
                }
                default:
                {
                    $this->logger->info('Event not recorded');
                    return new CreateMatchEventResponse(false);
                }

            }

        } catch (\Throwable $e) {

        }
    }

    private function mapToFoulDTO(CreateEventRequest $request): FoulDTO
    {
        return new FoulDTO(
            type: $request->type,
            matchId: $request->matchId,
            teamId: $request->teamId,
            minute: $request->minute,
            second: $request->second,
            committedBy: $request->player,
            sufferedBy: $request->affectedPlayerId
        );
    }

    private function mapToGoalDTO(CreateEventRequest $request): GoalDTO
    {
        return new GoalDTO(
            type: $request->type,
            matchId: $request->matchId,
            teamId: $request->teamId,
            minute: $request->minute,
            second: $request->second,
            scorerId: $request->scoredPlayerId,
            assistId: $request->assistPlayerId
        );
    }
}
