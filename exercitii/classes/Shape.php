<?php

abstract class Shape
{

    protected $x;

    protected $y;

    protected $width;

    protected $height;

    public static $nr_shapes = 0;

    public abstract function __construct($x, $y);

    abstract public function __destruct();

    abstract public function setDimensions($width, $height = NULL);

    abstract public function getType();

    abstract public function getRGBColor();

    abstract public function setColor(Color $color);

    abstract public function __toString();


    final public function getDimensions()
    {

        return array($this->width,$this->height);

    }

    public function getLocation()
    {

        return array($this->x, $this->y);

    }

}
