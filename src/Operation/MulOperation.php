<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Operation;

use EvgenijVY\FinOb\Internal\InternalNumber;
use EvgenijVY\FinOb\Number;

class MulOperation extends AbstractOperation
{
    protected function execution(InternalNumber $a, InternalNumber $b, int $precision): Number
    {
        return new InternalNumber((int) round($a->getData() * $b->getData()), $a->getPrecision() + $b->getPrecision());
    }
}
