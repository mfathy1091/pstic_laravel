<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Individual;
use App\Models\Relationship;

class IndividualController extends Controller
{

    public function index()
    {
        //
    }


    public function create($id)
    {
        $file = File::find($id);
        $genders = Gender::all();
        $nationalities = Nationality::all();
        $relationships = Relationship::all();

		return view('individuals.create', compact('file', 'genders', 'nationalities', 'relationships'));
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'file_id' => 'required',
            'individual_id' => 'required',
            'passport_number' => '',
            'name' => 'required',
            'native_name' => 'required',
            'age' => 'required',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'relationship_id' => 'required',
            'current_phone_number' => '',
        ]);
        
        
        //dd($data);
        
        $individual = Individual::create($data);
        
        return redirect()->route('files.show', [$request->input('file_id')]);
    }


    public function show($id)
    {
        $individual = Individual::find($id);

        return view('individuals.show', compact('individual'));
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
        Individual::findOrFail($id)->delete();
        return redirect()->back();
    }
}

