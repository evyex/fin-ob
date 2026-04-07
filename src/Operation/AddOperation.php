<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Operation;

use EvgenijVY\FinOb\Number;

class AddOperation extends AbstractOperation
{
    protected function execution(OperationNumber $a, OperationNumber $b, int $precision): Number
    {
        return new OperationNumber($a->getData() + $b->getData(), $a->getPrecision());
    }
}