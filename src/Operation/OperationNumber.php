<?php

declare(strict_types=1);

namespace Evgen\FinOb\Operation;

use Evgen\FinOb\Number;

/**
 * @internal
 */
final class OperationNumber extends Number
{
    public function __construct(int $data, int $precision = 2)
    {
        $this->data = $data;
        $this->precision = $precision;
    }

    public function getData(): int
    {
        return $this->data;
    }
}