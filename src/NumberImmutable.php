<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb;

class NumberImmutable extends AbstractNumber
{
    protected function apply(AbstractNumber $number): AbstractNumber
    {
        return self::fromNumber($number);
    }
}