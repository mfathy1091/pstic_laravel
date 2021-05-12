<?php

namespace App\Http\Controllers\ReferralSources;

use App\Http\Controllers\Controller;
use App\Models\ReferralSource;
use Illuminate\Http\Request;

class ReferralSourceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$referralSources = ReferralSource::all();
		return view('pages.referral_sources.referral_sources', compact('referralSources'));
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
			$referralSource = new ReferralSource();

			$referralSource->name = $request->name;
			$referralSource->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('referralsources.index');
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

		$referralSources = ReferralSource::find($id);
		$referralSources->name = $request->name;
		$referralSources->save();

		return redirect()->route('referralsources.index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		ReferralSource::findOrFail($request->id)->delete();
		return redirect()->route('referralsources.index');
	}
}