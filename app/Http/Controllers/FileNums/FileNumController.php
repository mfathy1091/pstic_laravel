<?php

namespace App\Http\Controllers\FileNums;

use App\Http\Controllers\Controller;
use App\Models\FileNum;
use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFileNumRequest;

class FileNumController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$filenums = FileNum::all();
		return view('pages.FileNums.FileNums', compact('filenums'));
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

		//dd($request->input('file_number'));
		//dd($request->input('file_owner'));
		//dd(request()->all());
		try {
			//$validated = $request->validated();
			$filenumber = new FileNum();

			$filenumber->filenum = $request->file_number;
			$filenumber->fileowner = $request->file_owner;
			$filenumber->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('filenum.index');
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
	}
}
