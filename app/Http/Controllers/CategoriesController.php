<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        // dd($collection->contains($request->status), $request->status);
          $models = categories::with('latestNode')->get();
         return response()->json($models);
    }
}