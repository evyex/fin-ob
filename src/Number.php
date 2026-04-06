<?php

declare(strict_types=1);

namespace Evgen\FinOb;

class Number extends AbstractNumber
{
    // Mutators
    public function changePrecision(int $precision): self
    {
        $this->setData((int) round($this->getData() * $this->scale($precision - $this->getPrecision())));
        $this->precision = $precision;

        return $this;
    }

    protected function apply(AbstractNumber $number): self
    {
        $this->data = $number->getData();
        $this->precision = $number->getPrecision();

        return $this;
    }

    protected function setData(int $data): self
    {
        $this->data = $data;

        return $this;
    }
}