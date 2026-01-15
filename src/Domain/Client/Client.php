<?php
declare(strict_types=1);

namespace App\Domain\Client;

use App\Domain\Client\VO\ClientId;

class Client
{
    public function __construct(
        private ClientId $id,
        private array $notificaionData
    )
    {
    }



}