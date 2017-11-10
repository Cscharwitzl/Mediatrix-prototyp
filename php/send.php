<?php

//phpinfo();

$channel = $_GET["data"];

$dmx = new DMX();

$erg = array(0 => 255);

print_r($_GET);


foreach ($channel as $entry) {
  $erg[$entry["channel"]] = $entry["value"];
}


$dmx::sendChannel($erg);

echo "finished";
