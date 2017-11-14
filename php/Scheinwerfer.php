<?php

declare(strict_types=1);

class Scheinwerfer{

    private $channel = array();

    function __constructor(array $channels){
      $channel = $channels;
    }

    function dimmen(int $val): boolean{
      DMX::sendChannel(array(
        $channel["hue"] => $val
      ));
    }

    function on(): boolean{
      DMX::sendChannel(array(
        $channel["hue"] => 255
      ));
    }

    function off(): boolean {
      DMX::sendChannel(array(
        $channel["hue"] => 0
      ));
    }

    function setChannels(): void{

    }

}
