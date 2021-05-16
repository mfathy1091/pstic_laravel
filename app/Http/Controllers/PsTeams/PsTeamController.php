<?php

namespace App\Http\Controllers\PsTeams;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsTeam;

class PsTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $psTeams = PsTeam::all();
        return view('pages.ps_teams.ps_teams', compact('psTeams'));
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

        try {
            //$validated = $request->validated();
            $psTeam = new PsTeam();

            $psTeam->name = $request->name;
            $psTeam->save();
            toastr()->success('Added Successfuly');
            return redirect()->route('psteams.index');
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

        $psTeam = PsTeam::find($id);
        $psTeam->name = $request->name;
        $psTeam->save();

        return redirect()->route('psteams.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        PsTeam::findOrFail($request->id)->delete();
        return redirect()->route('psteams.index');
    }
}