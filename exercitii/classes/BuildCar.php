<?php

include "CarPartsInterface.php";
include "Car.php";

class BuildCar extends Car implements CarPartsInterface
{

    const SPEED_LIMIT = 150;

    public string $color;
    public float $weightInTons;
    protected string $wheelsMaterial;
    private string $engineType;


    public function __construct(string $color, float $weightInTons, string  $wheelsMaterial, string $engineType)
    {
        $this->color = $color;
        $this->weightInTons = $weightInTons;
        $this->wheelsMaterial = $wheelsMaterial;
        $this->engineType = $engineType;
    }

    public function __set($attributeName, $value)
    {
        $this->attributeName = $value;
    }

    public function __get($attributeName)
    {
        return $this->attributeName;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * @return float
     */
    public function getWeightInTons(): float
    {
        return $this->weightInTons;
    }

    /**
     * @param float $weightInTons
     */
    public function setWeightInTons(float $weightInTons): void
    {
        $this->weightInTons = $weightInTons;
    }

    /**
     * @return string
     */
    public function getWheelsMaterial(): string
    {
        return $this->wheelsMaterial;
    }

    /**
     * @param string $wheelsMaterial
     */
    public function setWheelsMaterial(string $wheelsMaterial): void
    {
        $this->wheelsMaterial = $wheelsMaterial;
    }

    /**
     * @return string
     */
    public function getEngineType(): string
    {
        return $this->engineType;
    }

    /**
     * @param string $engineType
     */
    public function setEngineType(string $engineType): void
    {
        $this->engineType = $engineType;
    }

    protected function weightInKgs()
    {
        return $this->weightInTons * 1000;
    }

    private function startCar()
    {
        return 'vroom vroom with the ' . $this->engineType . ' engine';
    }

    public function customize()
    {
        return '<p>car color: ' . $this->color . ', car weight ' . $this->weightInTons . ' tons' .
            ', wheel material: ' . $this->wheelsMaterial .
            ', engine type: ' . $this->engineType .
            '</p>';
    }

    public function description()
    {
        return '<p>car color: ' . $this->color . ', car weight ' . $this->weightInTons . ' tons' .
            ', wheel material: ' . $this->wheelsMaterial .
            ', engine type: ' . $this->engineType .
            '</p>';

    }

    public function whatIsThis()
    {
        var_dump($this);
    }

    public function tires()
    {
        // TODO: Implement tires() method.
    }

    public function headlight()
    {
        // TODO: Implement headlight() method.
    }

    public function type(): string
    {
        return 'Plane-like';
    }

    public function getSeatsNumber(): int
    {
        return $this->numberOfSeats();
    }
}