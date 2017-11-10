<?php

//phpinfo();

$channel = $_GET["channel"];
$value = $_GET["value"];

$dmx = new DMX();

$erg = array();

print_r($channel);

foreach ($channel as $entry) {
  print_r(array($entry["channel"] => $entry["value"]));
  $erg.push(array($entry["channel"] => $entry["value"]));
}

$dmx::sendChannel(array(
  0 => 255,
  $channel => $value
));

echo "finished";
