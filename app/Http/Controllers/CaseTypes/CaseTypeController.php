<?php

namespace App\Http\Controllers\CaseTypes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseType;


class CaseTypeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$caseTypes = CaseType::all();
		return view('pages.case_types.case_types', compact('caseTypes'));
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
			$caseType = new CaseType();

			$caseType->name = $request->name;
			$caseType->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('casetypes.index');
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

		$caseType = CaseType::find($id);
		$caseType->name = $request->name;
		$caseType->save();

		return redirect()->route('casetypes.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		CaseType::findOrFail($request->id)->delete();
		return redirect()->route('casetypes.index');
	}
}