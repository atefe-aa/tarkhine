<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Foods;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchTerm = $request->input('query');
   
        $results = Foods::where('name', 'LIKE', "%$searchTerm%")->with('rating')->get();
    
        return FoodResource::collection($results);
    }
    

    
}
