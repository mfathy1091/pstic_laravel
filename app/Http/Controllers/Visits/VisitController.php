<?php

namespace App\Http\Controllers\Visits;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;

class VisitController extends Controller
{

    
    public function index()
    {
        $visits = Visit::all();
        
		return view('visits.visits',compact('visits'));
    }


    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {

        $data = request()->validate([
            'pss_case_id' => 'required',
            'record_id' => 'required',
            'visit_date' => 'required',
            'comment' => 'required',
        ]);
            
        //dd($request);
            
        $visit = Visit::create($data);
            
        return redirect()->back();
    }
    


    
    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }


    
    public function destroy($id)
    {
        Visit::findOrFail($id)->delete();
        return redirect()->back();
    }
}
