<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PssCase;
use App\Models\Status;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        //$statueses = DB::table('statuses')->select('name')->distinct()->get()->pluck('name');
        $statueses = Status::where('type', 'Psychosocial')->get();
        $teams = Team::where('department_id', Department::PSS_ID)->get();
        //$teams = Auth::user()->teams;

        $psWorkers = User::where('job_title_id', JobTitle::PS_WORKER_ID)->get();

        $pssCases = PssCase::query();

        if($request->filled('current_status_id'))
        {
            $pssCases->where('current_status_id', $request->current_status_id);                                         
        }

        if($request->filled('assigned_psw_id'))
        {
            $pssCases->where('assigned_psw_id', $request->assigned_psw_id);                                         
        }

/*         if($request->filled('team_id'))
        {
            $teamsIds = $teams->select('id')->distinct()->get()->pluck('id');
            $authUser = Auth::user()->teams;
            $teams = Team::all();
            
            $psWorkersIds = DB::table('users')
                    ->whereIn('team_id', $teamsIds)
                    ->select('id')->distinct()->get()->pluck('id');

            $pssCases->whereIn('assigned_psw_id', $psWorkersIds); 
        } */

        return view('pss_cases.index2', [
            'statuses' => $statueses,
            'teams' => $teams,
            'psWorkers' => $psWorkers,
            'pssCases' => $pssCases->get(),
        ]);
    }

    public function store(Request $request)
    {
        return $request->all();
        return view('pss_cases.index2');
    }





}





