<?php

include __DIR__ . '\..\system\Model.php';
use system\Model as Model;

class CurrencyConverterModel extends Model
{
    public function __construct(
        private float $value,
        private string $currency,
        private float $conversionRate
    )
    {
    }

    private function computeTotalValue(): float
    {
        return $this->value * $this->conversionRate;
    }

    public function getTotalValue(): float
    {
        return $this->computeTotalValue();
    }

    /**
     * @return float
     */
    public function getConversionRate(): float
    {
        return $this->conversionRate;
    }

    /**
     * @param float $conversionRate
     */
    public function setConversionRate(float $conversionRate): void
    {
        $this->conversionRate = $conversionRate;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }
}