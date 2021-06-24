<?php

namespace App\Http\Controllers\PssStatuses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PssStatus;

class PssStatusController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$pssStatuses = PssStatus::all();
		return view('pages.pss_statuses.pss_statuses', compact('pssStatuses'));
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
			$pssStatus = new PssStatus();

			$pssStatus->name = $request->name;
			$pssStatus->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('pssstatuses.index');
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

		$pssStatus = PSSStatus::find($id);
		$pssStatus->name = $request->name;
		$pssStatus->save();

		return redirect()->route('pssstatuses.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		PssStatus::findOrFail($request->id)->delete();
		return redirect()->route('pssstatuses.index');
	}
}