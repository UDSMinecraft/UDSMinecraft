<?php
class CSS {
    public static function genGradients($element, $color1, $color2) {
        return "$element {".PHP_EOL
              ."    background-image: -ms-linear-gradient(top, $color1 5%, $color2 100%);".PHP_EOL
              ."    background-image: -moz-linear-gradient(top, $color1 5%, $color2 100%);".PHP_EOL
              ."    background-image: -o-linear-gradient(top, $color1 5%, $color2 100%);".PHP_EOL
              ."    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, $color1), color-stop(1, $color2));".PHP_EOL
              ."    background-image: -webkit-linear-gradient(top, $color1 5%, $color2 100%);".PHP_EOL
              ."    background-image: linear-gradient(to bottom, $color1 5%, $color2 100%);".PHP_EOL
              ."}".PHP_EOL;
    }
}
