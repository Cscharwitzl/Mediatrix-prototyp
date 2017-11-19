<?php
/**
 * Created by PhpStorm.
 * User: cleme
 * Date: 19.11.2017
 * Time: 21:00
 */

namespace Mediatrix;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Application implements MessageComponentInterface
{
    function onOpen(ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
    }

    function onClose(ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }

    function onError(ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    function onMessage(ConnectionInterface $from, $msg)
    {
        // TODO: Implement onMessage() method.
    }
}