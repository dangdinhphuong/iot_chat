<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ratchet\Client\Connector;
use React\Socket\Connector as ReactConnector;
use React\EventLoop\LoopInterface;
use Ratchet\Client\WebSocket;
use Ratchet\RFC6455\Messaging\MessageInterface;


class SocketController extends Controller
{
    public function sendToSocket(Request $request)
    {
        $data = $request->all();
        // Kết nối tới WebSocket server
        $loop = app(LoopInterface::class);
        $connector = new Connector($loop, new ReactConnector([
            'dns' => '8.8.8.8',
            'timeout' => 10
        ]));
    
        $connector('wss://hieuns-e3324e230c8a.herokuapp.com:443', ['protocol1', 'subprotocol2'], ['Origin' => 'http://localhost'])
            ->then(function(WebSocket $conn) use ($data) {
                // Gửi dữ liệu tới WebSocket server khi kết nối được mở
                $conn->send($data);
    
                // Đóng kết nối sau khi gửi dữ liệu
                $conn->close();
            }, function(\Exception $e) use ($loop) {
                echo "Could not connect: {$e->getMessage()}\n";
                $loop->stop();
            });
    
        return response()->json(['status' => 'success']);
    }
    
}
