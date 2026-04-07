<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Operation;

use EvgenijVY\FinOb\AbstractNumber;
use EvgenijVY\FinOb\Number;

abstract class AbstractOperation
{
    public static function execute(AbstractNumber $a, AbstractNumber $b, ?int $precision = null): Number
    {
        if ($precision > 9) {
            throw new \InvalidArgumentException('Precision must be less than 9');
        }

        $operationPrecision = min(max($a->getPrecision(), $b->getPrecision(), $precision ?? 0), 10);
        $resultPrecision = $precision ?? min($a->getPrecision(), $b->getPrecision());

        return (new static())
            ->execution(
                OperationNumber::fromNumber($a)->changePrecision($operationPrecision),
                OperationNumber::fromNumber($b)->changePrecision($operationPrecision),
                $resultPrecision
            )
            ->changePrecision($resultPrecision);
    }

    abstract protected function execution(OperationNumber $a, OperationNumber $b, int $precision): Number;
}