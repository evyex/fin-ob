<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Internal;

final class PrecisionChecker
{
    public static function checkPrecision(int $precision): void
    {
        if ($precision < 0 || $precision > 9) {
            throw new \InvalidArgumentException('Precision must be between 0 and 9');
        }
    }
}