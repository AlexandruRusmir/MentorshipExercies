<?php

class TuningCar extends Car implements CarPartsInterface
{
    public string $color;
    public float $weightInTons;
    protected string $wheelsMaterial;
    private string $engineType;



    public function description()
    {
        return '<p>car color: ' . $this->color . ', car weight ' . $this->weightInTons . ' tons' .
            ', wheel material: ' . $this->wheelsMaterial .
            ', engine type: ' . $this->engineType .
            '</p>';

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

    public function numberOfSeats(): int
    {
        return 2;
    }
}