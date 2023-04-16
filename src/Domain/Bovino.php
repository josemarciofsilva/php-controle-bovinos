<?php

declare(strict_types=1);

namespace App\Domain;

use DateTime;
use Ramsey\Uuid\Uuid;

class Bovino
{
    private string $uuid;
    private string $race;
    private float $weight;
    private DateTime $dateOfBirth;
    private int $productionOfLitersOfMilkPerWeek;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(
        string $uuid,
        string $race,
        float $weight,
        DateTime $dateOfBirth,
        int $productionOfLitersOfMilkPerWeek,
        DateTime $createdAt,
        DateTime $updatedAt
    )
    {
        $this->uuid = $uuid;
        $this->race = $race;
        $this->weight = $weight;
        $this->dateOfBirth = $dateOfBirth;
        $this->productionOfLitersOfMilkPerWeek = $productionOfLitersOfMilkPerWeek;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public function race(): string
    {
        return $this->race;
    }

    public function weight(): float
    {
        return $this->weight;
    }

    public function dateOfBirth(): DateTime
    {
        return $this->dateOfBirth;
    }

    public function productionOfLitersOfMilkPerWeek(): int
    {
        return $this->productionOfLitersOfMilkPerWeek;
    }

    public function createdAt(): DateTime
    {
        return $this->createdAt;
    }

    public function updatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function toArray(): array
    {
        return [
            "uuid" => $this->uuid,
            "race" => $this->race,
            "weight" => $this->weight,
            "dateOfBirth" => $this->dateOfBirth->format('d-m-Y'),
            "productionOfLitersOfMilkPerWeek" => $this->productionOfLitersOfMilkPerWeek,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt
        ];
    }

}

