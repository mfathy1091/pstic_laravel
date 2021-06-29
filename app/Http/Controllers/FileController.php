<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Beneficiary;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();

        return view('files.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all();
        $genders = Gender::all();
        $nationalities = Nationality::all();

		return view('files.create', compact('files', 'genders', 'nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileData = request()->validate([
            'number' => 'required',
        ]);

        $fileData += ['created_user_id' => auth()->id()];

        $file = File::create($fileData);

        //$file = File::find(10);
        
        //dd($request);
        $PaBeneficiaryData = request()->validate([
            'individual_id' => 'required',
            'passport_number' => '',
            'name' => 'required',
            'native_name' => 'required',
            'age' => 'required',
            'gender_id' => 'required',
            'nationality_id' => 'required',
            'current_phone_number' => '',
        ]);
        
        $PaBeneficiaryData += ['file_id' => $file->id];
        $PaBeneficiaryData += ['relationship_id' => 1];
        
        //dd($PaBeneficiaryData);
        
        $beneficiary = Beneficiary::create($PaBeneficiaryData);
        

        return redirect()->route('files.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);

        return view('files.show', compact('file'));
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
