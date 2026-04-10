<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Operation;

use EvgenijVY\FinOb\Internal\InternalNumber;
use EvgenijVY\FinOb\Number;

class DivOperation extends AbstractOperation
{
    protected function execution(InternalNumber $a, InternalNumber $b, int $precision): Number
    {
        if ($b->getData() === 0) {
            throw new \DivisionByZeroError('Division by zero');
        }

        $scale = 10 ** $precision;

        return new InternalNumber((int) round($a->getData() * $scale / $b->getData(), $precision) , $precision);
    }
}
