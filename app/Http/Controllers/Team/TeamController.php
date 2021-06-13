<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Employee;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $teams = Team::all();
        return view('teams.index', compact('teams'));
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
            $team = new Team();

            $team->name = $request->name;
            $team->save();
            toastr()->success('Added Successfuly');
            return redirect()->route('teams.index');
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
        $team = Team::find($id);
        $employees = $team->employees;

        return view('teams.show', compact('team', 'employees'));
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

        $team = Team::find($id);
        $team->name = $request->name;
        $team->save();

        return redirect()->route('teams.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        Team::findOrFail($request->id)->delete();
        return redirect()->route('teams.index');
    }
}