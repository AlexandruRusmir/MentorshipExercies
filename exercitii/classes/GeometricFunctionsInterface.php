<?php

interface GeometricFunctionsInterface
{

    public function getArea();

    public function moveRelative(int $x_offset, int $y_offset): void;

    public function scale($factor);

}