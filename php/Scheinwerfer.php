<?php

declare(strict_types=1);

namespace Mediatrix;

class Scheinwerfer{

    private $channels = array();

    function __constructor(array $channels){
         $this->channels = $channels;
    }

    function dimmen(int $val): boolean{
      DMX::sendChannel(array(
          $this->channels["hue"] => $val
      ));
    }

    function on(): boolean{
      DMX::sendChannel(array(
        $this->channels["hue"] => 255
      ));
    }

    function off(): boolean {
      DMX::sendChannel(array(
        $this->channels["hue"] => 0
      ));
    }
}
