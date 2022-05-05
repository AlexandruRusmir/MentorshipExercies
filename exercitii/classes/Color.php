<?php

    class Color
    {

        private $r;

        private $g;

        private $b;

        public function __construct($r,$g,$b)
        {

            $this->r = $r;

            $this->g = $g;

            $this->b = $b;

        }

        public static function make($color_name)
        {

            $colors = array(

                'white' => array(255,255,255),

                'red' => array(255,0,0),

            );

            if (!isset($colors[$color_name]))

                return NULL;

            list ($r,$g,$b) = $colors[$color_name];

            return new Color($r,$g,$b);

        }

        public function __get($name)
        {

            if ($name == 'rgb')

                return "$this->r $this->g $this->b";

        }

    }
