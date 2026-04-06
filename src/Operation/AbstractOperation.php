<?php

declare(strict_types=1);

namespace Evgen\FinOb\Operation;

use Evgen\FinOb\AbstractNumber;
use Evgen\FinOb\Number;

abstract class AbstractOperation
{
    public static function execute(AbstractNumber $a, AbstractNumber $b, ?int $precision = null): Number
    {
        $operationPrecision = max($a->getPrecision(), $b->getPrecision(), $precision ?? 0);

        return (new static())
            ->execution(
                OperationNumber::fromNumber($a)->changePrecision($operationPrecision),
                OperationNumber::fromNumber($b)->changePrecision($operationPrecision)
            )
            ->changePrecision($precision ?? min($a->getPrecision(), $b->getPrecision()));
    }

    abstract protected function execution(OperationNumber $a, OperationNumber $b): Number;
}