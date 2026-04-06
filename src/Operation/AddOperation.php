<?php

declare(strict_types=1);

namespace Evgen\FinOb\Operation;

use Evgen\FinOb\Number;

class AddOperation extends AbstractOperation
{
    protected function execution(OperationNumber $a, OperationNumber $b): Number
    {
        return new OperationNumber($a->getData() + $b->getData(), $a->getPrecision());
    }
}