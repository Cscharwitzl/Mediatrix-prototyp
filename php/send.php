<?php

//phpinfo();

echo "create DMX";

$dmx = new DMX();

echo "blackout";

$dmx::blackout();

echo "channel";

$dmx::sendChannel(array(
  0 => 10,
  1 => 30,
  2 => 100
));

echo "finished";
