<?php

declare(strict_types=1);

include_once 'vendor/autoload.php';

echo PHP_EOL;
$r = (new \Evgen\FinOb\Number(0.1,1))->add(new \Evgen\FinOb\NumberImmutable(0.2, 15 ), 15);
echo 'Class: ' . $r::class;
echo PHP_EOL;
echo 'Precision: ' . $r->getPrecision();
echo PHP_EOL;
echo 'Float: ' . $r->toFloat();
echo PHP_EOL;
echo 'Print: ' . $r->toPrint();
echo PHP_EOL;
echo 'String: ' . $r;
echo PHP_EOL;