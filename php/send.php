<?php

//phpinfo();

$channel = $_GET["channel"];
$value = $_GET["value"];

$dmx = new DMX();

$erg = array();

foreach ($channel as $entry) {
  $erg.push(array($entry["channel"] => $entry["value"]));
}

$dmx::sendChannel(array(
  0 => 255,
  $channel => $value
));

echo "finished";
