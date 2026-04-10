<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb;

use EvgenijVY\FinOb\Internal\AbstractNumber;
use EvgenijVY\FinOb\Internal\InternalNumber;
use EvgenijVY\FinOb\Internal\PrecisionChecker;

class Compare
{
    public static function equal(AbstractNumber $a, AbstractNumber $b, int $precision = 2): bool
    {
        return static::normalize($a, $precision) === static::normalize($b, $precision);
    }

    public static function notEqual(AbstractNumber $a, AbstractNumber $b, int $precision = 2): bool
    {
        return static::normalize($a, $precision) !== static::normalize($b, $precision);
    }

    public static function greaterThan(AbstractNumber $a, AbstractNumber $b, int $precision = 2): bool
    {
        return static::normalize($a, $precision) > static::normalize($b, $precision);
    }

    public static function greaterOrEqual(AbstractNumber $a, AbstractNumber $b, int $precision = 2): bool
    {
        return static::normalize($a, $precision) >= static::normalize($b, $precision);
    }

    public static function lessThan(AbstractNumber $a, AbstractNumber $b, int $precision = 2): bool
    {
        return static::normalize($a, $precision) < static::normalize($b, $precision);
    }

    public static function lessOrEqual(AbstractNumber $a, AbstractNumber $b, int $precision = 2): bool
    {
        return static::normalize($a, $precision) <= static::normalize($b, $precision);
    }

    public static function between(AbstractNumber $a, AbstractNumber $min, AbstractNumber $max, int $precision = 2): bool
    {
        return static::greaterOrEqual($a, $min, $precision) && static::lessOrEqual($a, $max, $precision);
    }

    /**
     * @return int<0, 1, -1> 0 if equal, 1 if a is greater, -1 if b is greater
     */
    public static function compare(AbstractNumber $a, AbstractNumber $b, int $precision = 2): int
    {
        return static::normalize($a, $precision) <=> static::normalize($b, $precision);
    }

    protected static function normalize(AbstractNumber $number, int $precision): int
    {
        PrecisionChecker::checkPrecision($precision);

        return InternalNumber::fromNumber($number)->changePrecision($precision)->getData();
    }
}