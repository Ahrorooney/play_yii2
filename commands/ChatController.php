<?php
namespace app\commands;
use yii\console\Controller;
use Ratchet\App;
use Ratchet\Server\EchoServer;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use yii\console\ExitCode;
use yii\helpers\Console;

//// Make sure composer dependencies have been installed
//require __DIR__ . '/vendor/autoload.php';

class ChatController extends Controller {

    public function actionStart() {
        // Run the server application through the WebSocket protocol on port 8080
        $app = new App('localhost', 8081);
        $app->route('/chat', new MyChat, array('*'));
        $app->route('/echo', new EchoServer, array('*'));
        $app->run();
    }

}

/**
 * chat.php
 * Send any incoming messages to all connected clients (except sender)
 */
class MyChat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        foreach ($this->clients as $client) {
            if ($from != $client) {
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }
}

