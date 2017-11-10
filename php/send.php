<?php

//phpinfo();

$channel = $_GET["channel"];
$value = $_GET["value"];

$dmx = new DMX();

$dmx::sendChannel(array(
  $channel => $value,
));

echo "finished";
