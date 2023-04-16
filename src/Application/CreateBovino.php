<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Bovino;
use App\Domain\BovinoException;
use DateTime;
use Ramsey\Uuid\Uuid;


class CreateBovino
{
    public function __construct()
    {

    }

    public function execute(array $data): array
    {
        $uuid = Uuid::uuid4()->toString();

        $dateOfBirth = $data['dateOfBirth'];
        $this->checkDateOfBirthFuture($dateOfBirth);

        $bovino = new Bovino(
            $uuid,
            $data['race'],
            $data['weight'],
            new DateTime($data['dateOfBirth']),
            $data['productionOfLitersOfMilkPerWeek'],
            new DateTime(),
            new DateTime()
        );

       return $bovino->toArray();
    }

    private function checkDateOfBirthFuture(string $dateOfBirth): void
    {
       $hoje = date('Y-m-d');
       if(strtotime($dateOfBirth) > strtotime($hoje)){
            throw BovinoException::forInvalidDateOfBirth();
       }
    }
}
