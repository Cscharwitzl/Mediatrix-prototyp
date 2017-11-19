<?php

use Ratchet\Server\IoServer;
use Mediatrix\Application;

  require __DIR__ . '/../vendor/autoload.php';

  $server = IoServer::factory(
        new Application(),
        8080
  );

  $server->run();
