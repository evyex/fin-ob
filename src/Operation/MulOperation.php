<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Operation;

use EvgenijVY\FinOb\Number;

class MulOperation extends AbstractOperation
{
    protected function execution(OperationNumber $a, OperationNumber $b, int $precision): Number
    {
        return new OperationNumber((int) round($a->getData() * $b->getData()), $a->getPrecision() + $b->getPrecision());
    }
}
