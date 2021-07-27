<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Individual;


class SearchController extends Controller
{
    public function index2(Request $request)
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

    public function index(Request $request)
    {
        //dd($request);

        $file_number = $request->input('file_number');
        $individual_id = $request->input('individual_id');
        $passport_number = $request->input('passport_number');
        $name = $request->input('name');


        $individuals = Individual::query();
        //dd($individuals);

        if($request->filled('file_number')){
            $individuals->with('file')->whereHas('file', function($q) use ($file_number){
                return $q->where('number', 'like', "%$file_number%");
            });
        }
        if($request->filled('individual_id')){
            $individuals->orWhere('individual_id', 'like', "%$individual_id%");
        }
        if($request->filled('passport_number')){
            $individuals->orWhere('passport_number', 'like', "%$passport_number%");
        }
        if($request->filled('name')){
            $individuals->orWhere('name', 'like', "%$name%")
            ->orWhere('native_name', 'like', "%$name%");
        }

                
        return view('individuals.search_results', ['individuals' => $individuals->get()]);
    }
}
