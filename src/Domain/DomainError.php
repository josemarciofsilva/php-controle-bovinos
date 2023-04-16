<?php

declare(strict_types=1);

namespace App\Domain;

use DomainException;
use Exception;

class DomainError extends DomainException
{
    private string $type;

    public function __construct(string $type, string $message, int $code, ?Exception $exception = null)
    {
        $this->type = $type;
        parent::__construct($message, $code, $exception);
    }

    public function getType(): string
    {
        return $this->type;
    }
}