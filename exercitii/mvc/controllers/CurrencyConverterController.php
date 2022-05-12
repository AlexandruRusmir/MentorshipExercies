<?php

include __DIR__ . '\..\system\Controller.php';
use system\Controller as Controller;

class CurrencyConverterController extends Controller
{

    public function __construct(private array $models)
    {
    }

    public function modifyModels(string $receivedConversionRate, float $value)
    {
        $valueInEuro = $value / $receivedConversionRate;
        foreach ($this->models as $model) {
            $model->setValue($valueInEuro * $model->getConversionRate());
        }
    }
}