<?php

namespace App\Http\Controllers\CaseStatuses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CaseStatus;

class CaseStatusController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$caseStatuses = CaseStatus::all();
		return view('pages.case_statuses.case_statuses', compact('caseStatuses'));
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
			$caseStatus = new CaseStatus();

			$caseStatus->name = $request->name;
			$caseStatus->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('casestatuses.index');
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

		$caseStatus = CaseStatus::find($id);
		$caseStatus->name = $request->name;
		$caseStatus->save();

		return redirect()->route('casestatuses.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		CaseStatus::findOrFail($request->id)->delete();
		return redirect()->route('casestatuses.index');
	}
}