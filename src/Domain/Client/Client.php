<?php
declare(strict_types=1);

namespace App\Domain\Client;

class Client
{
    public function __construct(
        private ClientId $id,
        private array $notificaionData
    )
    {
    }



}