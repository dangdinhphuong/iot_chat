<?php

namespace App\Listeners\Multiple;

use App\Listeners\NodeEvent;
use App\Models\categories;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Validator;
use Exception;
use WebSocket\Client;
class Realtime
{


    public function handle($event)
    {
        $data = json_encode(['data'=>$event->data,'type'=>'MultipleData']);
        if (empty($data)) {
            return false;
        }
        $options = [
            'timeout' => 30, // thời gian chờ kết nối
            'readTimeout' => 5 // thời gian chờ đọc
        ];
        $client = new Client("wss://hieuns-e3324e230c8a.herokuapp.com:443", $options);
        $client->send($data);
        $client->close();
        return true;
    }
}
