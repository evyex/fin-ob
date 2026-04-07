<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Operation;

use EvgenijVY\FinOb\Number;

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