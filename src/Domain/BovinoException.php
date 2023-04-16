<?php

declare(strict_types=1);

namespace App\Domain;

final class BovinoException extends DomainError
{
    public static function forInvalidDateOfBirth(): self
    {
        return new self('InvalidDateOfBirth', 'A data informada é maior que a data atual.', 400);
    }
}