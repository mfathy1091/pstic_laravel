<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Individual;


class SearchController extends Controller
{
    public function index(Request $request)
    {
/*         $data = request()->validate([
            'file_number' => 'required',
            'individual_number' => 'required',
            'passport_number' => 'required',
        ]); */

        $request->validate([
            'query' =>'required',
        ]);

        $query = $request->input('query');
        //dd($query);
        //$files = File::where('number', 'like', "%$query%")->get();
        
        $individuals = Individual::with('file')->whereHas('file', function($q) use ($query){
            return $q->where('number', 'like', "%$query%");
        })->orWhere('individual_id', 'like', "%$query%")
        ->orWhere('passport_number', 'like', "%$query%")
        ->orWhere('name', 'like', "%$query%")
        ->orWhere('native_name', 'like', "%$query%")
        ->get();
        //dd($individuals);
        
        return view('individuals.search_results', compact('individuals'));
    }
}
