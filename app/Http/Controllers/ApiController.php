<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\node;
use Validator;
use App\Events\NodeEvent;
class ApiController extends Controller
{
    public function getAllWithNode(Request $request)
    {
          $models = categories::with('latestNode')->get();
         return response()->json($models);
    }

    public function getCate(Request $request)
    {
       $data=['djfsdifjsdfkjgkfdgjkf'];
        return view('SendData',compact('data'));
//          $models = categories::get();
//         return response()->json($models);
    }

    public function getNode(Request $request)
    {
          $models = node::get();
         return response()->json($models);
    }

    public function createCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $request->status = $request->status ? 1 : 0;
        return response()->json( categories::create([
            'name'=> $request->name,
            'status'=> $request->status
        ]));
    }

    public function updateCategory(Request $request,$id)
    {
        $categories =  categories::find($id);
        if($categories){
            $request->status = $request->status ? 1 : 0;
            return response()->json( $categories->update($request->all()));
        }
        return response()->json([
            'status'=> 501,
            'massage'=> "Sửa thất bại "
        ]);

    }
    public function deleteCategory(Request $request,$id)
    {
        categories::find($id)->delete();
        node::where('cate_id',$id)->delete();
        return response()->json([
            'status'=> 200,
            'massage'=> "Xóa thành công "
        ]);

    }

    public function createNode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cate_id' => 'required|numeric|exists:categories,id',
            'temperature' => 'required|numeric',
            'pressure' => 'required|numeric',
            'altitude_sea' => 'required|numeric',
            'altitude_cm' => 'required|numeric',
        ], [
            'cate_id.exists' => 'The selected cate_id is invalid.',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        return response()->json( node::create($request->all()));
    }
    public function createMultipleNode(Request $request)
    {
        $data = $request->all();
        event(new NodeEvent($data));
    }

    public function connectToWebSocket($data=[])
    {
        return view('SendData',compact('data'));
    }
}
