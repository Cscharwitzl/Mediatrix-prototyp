<?php

//phpinfo();

$channel = $_GET["channel"];
$value = $_GET["value"];

$dmx = new DMX();

$dmx::sendChannel(array(
  0 => 255,
  $channel => $value
));

echo "finished";
