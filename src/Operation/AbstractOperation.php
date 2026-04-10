<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Operation;

use EvgenijVY\FinOb\Internal\InternalNumber;
use EvgenijVY\FinOb\Internal\AbstractNumber;
use EvgenijVY\FinOb\Internal\PrecisionChecker;
use EvgenijVY\FinOb\Number;

abstract class AbstractOperation
{
    public static function execute(AbstractNumber $a, AbstractNumber $b, ?int $precision = null): Number
    {
        PrecisionChecker::checkPrecision($precision ?? 2);

        $operationPrecision = min(max($a->getPrecision(), $b->getPrecision(), $precision ?? 0), 10);
        $resultPrecision = $precision ?? min($a->getPrecision(), $b->getPrecision());

        return (new static())
            ->execution(
                InternalNumber::fromNumber($a)->changePrecision($operationPrecision),
                InternalNumber::fromNumber($b)->changePrecision($operationPrecision),
                $resultPrecision
            )
            ->changePrecision($resultPrecision);
    }

    abstract protected function execution(InternalNumber $a, InternalNumber $b, int $precision): Number;
}