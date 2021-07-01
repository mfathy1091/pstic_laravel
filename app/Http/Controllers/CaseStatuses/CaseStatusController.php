<?php

namespace App\Http\Controllers\Statuses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Status;

class StatusController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$statuses = Status::all();
		return view('pages.statuses.statuses', compact('statuses'));
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
			$status = new Status();

			$status->name = $request->name;
			$status->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('statuses.index');
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

		$status = Status::find($id);
		$status->name = $request->name;
		$status->save();

		return redirect()->route('statuses.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		Status::findOrFail($request->id)->delete();
		return redirect()->route('statuses.index');
	}
}