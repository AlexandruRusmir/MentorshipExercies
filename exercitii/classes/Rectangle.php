<?php
include "Shape.php";
include "Color.php";
include "GeometricFunctionsInterface.php";


class Rectangle extends Shape implements GeometricFunctionsInterface
{

    const TYPE = 'Rectangle';

    private $color = NULL;

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    function __destruct()
    {
    }

    function __toString(): string
    {
        return 'x: ' . $this->x . ', y: ' . $this->y . ', width: ' . $this->width . ', height:' . $this->height;
    }

    function getRGBColor()
    {
        // TODO: Implement getRGBColor() method.
    }

    function setColor(Color $color)
    {
        // TODO: Implement setColor() method.
    }

    function getType()
    {
        // TODO: Implement getType() method.
    }

    function setDimensions($width, $height = NULL)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function scale($amount)
    {
        $this->width *= $amount;
        $this->height *= $amount;
    }

    public function moveRelative(int $x_offset, int $y_offset) : void
    {
        $this->x += $x_offset;
        $this->y += $y_offset;
    }

    public function getArea(): float
    {
        return $this->width * $this->height;
    }
}