<?php

//phpinfo();

$channel = $GET["channel"];
$value = $GET["value"];

$dmx = new DMX();

$dmx::sendChannel(array(
  $channel => $value,
));

echo "finished";
