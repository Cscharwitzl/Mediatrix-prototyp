<?php

//phpinfo();

$channel = $_GET[0];

$dmx = new DMX();

$erg = array(0 => 255);

print_r($channel);


foreach ($channel as $entry) {
  print_r($entry["channel"] => $entry["value"]);
  $erg.push($entry["channel"] => $entry["value"]);
}


$dmx::sendChannel(array(

  $channel => $value
));

echo "finished";
