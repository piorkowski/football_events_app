<?php
declare(strict_types=1);

namespace App\Application\EventHandler;


use App\Domain\Event\DomainEvent\FoulCommittedEvent;
use App\Domain\Shared\DomainEventInterface;
use App\Domain\Statistics\MatchStatistics;
use App\Domain\Statistics\StatisticsProjectionRepositoryInterface;
use App\Domain\Statistics\StatisticsRepositoryInterface;

final readonly class UpdateStatisticsOnFoulCommittedHandler implements DomainEventHandlerInterface
{
    public function __construct(
        private StatisticsRepositoryInterface $statisticsReadRepository,
        private StatisticsProjectionRepositoryInterface $statisticsWriteRepository
    ) {}

    public function handle(DomainEventInterface $event): void
    {
        if (!$event instanceof FoulCommittedEvent) {
            return;
        }

        $statistics = $this->statisticsReadRepository->findByMatchId($event->matchId);

        if ($statistics === null) {
            $statistics = new MatchStatistics($event->matchId);
        }

        $statistics->incrementFouls($event->teamId);

        $this->statisticsWriteRepository->save($statistics);
    }
}
