<?php

//phpinfo();

echo "create DMX";

$dmx = new DMX();

echo "blackout";

$dmx::blackout();

echo "channel";

$dmx::sendChannel(array(
  1 => 10,
  2 => 30,
  3 => 100
));

echo "finished";
