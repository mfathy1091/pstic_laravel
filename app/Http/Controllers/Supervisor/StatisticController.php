<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Month;
use App\Models\Employee;
use App\Models\PssCaseActivity;
use App\Models\PssCase;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $psWorkersCount = Employee::where('job_title_id', '1')->get()->count();

        $months = Month::with('pssCaseActivities')
            ->where('name', 'June')
            ->get();
        
/*         $june = Month::where('name', 'June')->first();
        $activitiesJune = $june->pssCaseActivities;
        $activitiesJuneNew = $activitiesJune->new->get(); */

        //$activitiesJuneNew = PssCaseActivity::status(2)->months([1, 2, 3, 4, 5, 6])->get();

        //$pssCases = PssCase::has('pssCaseActivities')->get();

        $pssCases = PssCase::whereHas('pssCaseActivities', function($query){
            return $query->where('month_id', 6);
        })->get();




        dd($pssCases);

        return view('supervisor.statistics.index', compact('psWorkersCount', 'months', 'activitiesJune'));
    }












    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
