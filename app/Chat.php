<?php

namespace App;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

use Illuminate\Support\Facades\Auth;

class Chat implements MessageComponentInterface {

    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        foreach ($this->clients as $client) {
            $client->send($conn->resourceId . ";user_connected;" . $client->resourceId);
        }

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n", $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // If sender is not the receiver, then send message to others
                if (strpos($msg, "user_connected") == true) {
                    $client->send($from->resourceId . ";" . $msg);
                }
                else if (strpos($msg, "user_disconnected") == true) {
                    $client->send($from->resourceId . ";" . $msg);
                }
                else {
                    $client->send($msg);
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        foreach ($this->clients as $client) {
            $client->send($conn->resourceId . ";user_disconnected;" . $client->resourceId);
        }

        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

}
