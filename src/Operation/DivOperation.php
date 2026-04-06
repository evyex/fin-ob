<?php

declare(strict_types=1);

namespace Evgen\FinOb\Operation;

use Evgen\FinOb\Number;

class DivOperation extends AbstractOperation
{
    protected function execution(OperationNumber $a, OperationNumber $b, int $precision): Number
    {
        if ($b->getData() === 0) {
            throw new \DivisionByZeroError('Division by zero');
        }

        $scale = 10 ** $precision;

        return new OperationNumber((int) round($a->getData() * $scale / $b->getData(), $precision) , $precision);
    }
}
