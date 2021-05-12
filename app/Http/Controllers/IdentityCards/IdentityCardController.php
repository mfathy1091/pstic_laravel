<?php

namespace App\Http\Controllers\IdentityCards;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\IdentityCard;


class IdentityCardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$identityCards = IdentityCard::all();
		return view('pages.identity_cards.identity_cards', compact('identityCards'));
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
			$identityCard = new IdentityCard();

			$identityCard->number = $request->file_number;
			$identityCard->owner = $request->file_owner;
			$identityCard->save();
			toastr()->success('Added Successfuly');
			return redirect()->route('identitycards.index');
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
	public function update(Request $request, $id)
	{
		//dd($request);

		$identityCard = IdentityCard::find($id);
		$identityCard->number = $request->file_number;
		$identityCard->owner = $request->file_owner;
		$identityCard->save();

		return redirect()->route('identitycards.index');
	}
	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		IdentityCard::findOrFail($request->id)->delete();
		return redirect()->route('identitycards.index');
	}
}
