<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Beneficiary;
use App\Models\Relationship;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $file = File::find($id);
        $genders = Gender::all();
        $nationalities = Nationality::all();
        $relationships = Relationship::all();

		return view('beneficiaries.create', compact('file', 'genders', 'nationalities', 'relationships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        
        $beneficiary = Beneficiary::create($data);
        
        return redirect()->route('files.show', [$request->input('file_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
