<?php

namespace App\Http\Controllers\Nationality;

use App\Http\Controllers\Controller;
use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$nationalities = Nationality::all();
		return view('pages.nationalities.nationalities', compact('nationalities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $name = $request->input('name');
        //dd($request);

		try {
			//$validated = $request->validated();
			$nationality = new Nationality();

			$nationality->name = $request->nationality;
			$nationality->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('nationalities.index');
		}
		
		catch (\Exception $e){
			return redirect()->back()->withErrors(['error' => $e->getMessage()]);
		} 

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	}


	public function update(Request $request, $id)
	{
		//dd($request);

		$nationality = Nationality::find($id);
		$nationality->name = $request->nationality;
		$nationality->save();

		return redirect()->route('nationalities.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		Nationality::findOrFail($request->id)->delete();
		return redirect()->route('nationalities.index');
	}
}