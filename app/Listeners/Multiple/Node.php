<?php

namespace App\Listeners\Multiple;

use App\Listeners\NodeEvent;
use App\Models\categories;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Validator;
use Exception;

class Node
{


    public function handle($event)
    {
        $data = $event->data;
        if (empty($data)) {
            return false;
        }
        foreach($data as $item){
            $item['status'] = $item['status'] ? 1 : 0;
            categories::find($item['cate_id'])->update(['status'=>1]);

            $validator = Validator::make($item, [
                'cate_id' => 'required|numeric|exists:categories,id',
                'temperature' => 'required|numeric',
                'pressure' => 'required|numeric',
                'altitude_sea' => 'required|numeric',
                'altitude_cm' => 'required|numeric',
            ]);
            if (!$validator->fails()) {
                try {
                    \App\Models\node::create($item);
                } catch (Exception $e) {
                    Log::info('[' . __FUNCTION__ . '] <[{ ' .json_encode($e). ' }]> ');
                }
            }
        }
        return response()->json([
            'status'=> 200,
            'massage'=> "Thêm thành công "
        ]);
    }
}
