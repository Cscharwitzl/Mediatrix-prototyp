<?php

//phpinfo();

$channel = $_GET["data"];

$dmx = new DMX();

$erg = array(0 => 255);

print_r($_GET);


foreach ($channel as $entry) {
  print_r($entry["channel"] => $entry["value"]);
  $erg.push($entry["channel"] => $entry["value"]);
}


$dmx::sendChannel(array(

  $channel => $value
));

echo "finished";
