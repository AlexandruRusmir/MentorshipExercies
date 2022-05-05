<?php

abstract class Car
{
    abstract function type() : string;

    protected function numberOfSeats() : int
    {
        return 5;
    }
}