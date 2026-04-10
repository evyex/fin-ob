<?php

declare(strict_types=1);

namespace EvgenijVY\FinOb\Internal;

use EvgenijVY\FinOb\Operation\AddOperation;
use EvgenijVY\FinOb\Operation\DivOperation;
use EvgenijVY\FinOb\Operation\MulOperation;
use EvgenijVY\FinOb\Operation\SubOperation;

abstract class AbstractNumber
{
    protected int $data;
    protected int $precision;

    public function __construct(int|float|string $number, int $precision = 2)
    {
        if (!is_numeric($number)) {
            throw new \InvalidArgumentException('Number must be numeric');
        }

        PrecisionChecker::checkPrecision($precision);

        $this->precision = $precision;
        $this->data = (int) round((float) $number * $this->scale($this->precision));
    }

    public static function fromNumber(AbstractNumber $number): static
    {
        $class = static::class;
        $object = new $class($number->getData(), 0);
        $object->precision = $number->getPrecision();

        return $object;
    }

    public function getPrecision(): int
    {
        return $this->precision;
    }

    // Convert functions
    public function toPrint(): string
    {
        $data = explode('.', (string) $this->toFloat());
        return $data[0] . '.' . str_pad($data[1] ?? '', $this->precision, '0') ;
    }

    public function toFloat(): float
    {
        return $this->data / $this->scale($this->precision);
    }

    public function __toString(): string
    {
        return (string) $this->toFloat();
    }

    // Math functions
    public function add(AbstractNumber $number, ?int $precision = null): AbstractNumber
    {
        return $this->apply(AddOperation::execute($this, $number, $precision));
    }

    public function sub(AbstractNumber $number, ?int $precision = null): AbstractNumber
    {
        return $this->apply(SubOperation::execute($this, $number, $precision));
    }

    public function mul(AbstractNumber $number, ?int $precision = null): AbstractNumber
    {
        return $this->apply(MulOperation::execute($this, $number, $precision));
    }

    public function div(AbstractNumber $number, ?int $precision = null): AbstractNumber
    {
        return $this->apply(DivOperation::execute($this, $number, $precision));
    }

    // Internal functions
    abstract protected function apply(AbstractNumber $number): AbstractNumber;

    protected function getData(): int
    {
        return $this->data;
    }

    protected function scale(int $precision): float
    {
        return 10 ** $precision;
    }
}
