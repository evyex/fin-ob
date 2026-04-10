<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Internal;

use EvgenijVY\FinOb\Number;

/**
 * @internal
 */
final class InternalNumber extends Number
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