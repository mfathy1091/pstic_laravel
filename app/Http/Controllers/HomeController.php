<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PssCase;
use App\Models\Employee;
use App\Models\Individual;
use App\Models\Month;
use App\Models\Referral;
use App\Models\Section;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
                // June PSS Cases
/*                 $pssCases = PssCase::with('monthly_records', 'beneficiaries')
                ->whereHas('monthly_records', function($query){
                    return $query->where('moonth_id', '6');
                })->get(); */
    
            // June PSS Beneficiaries with Ahmed
/*             $pssBeneficiaries = Beneficiary::with('monthly_records', 'pssCases')
                ->whereHas('pssCases', function($query){
                    return $query->where('assigned_psw_id', '3');
                })->whereHas('monthly_records', function($query){
                    return $query->where('moonth_id', '6');
                })
                ->get(); */




        $psWorkersCount = Employee::where('job_title_id', '1')->get()->count();
        $psCasesCount = PssCase::all()->count();

        $months = Month::with('referrals')
            ->where('name', 'June')
            ->get();
        
        $referral = Referral::find(1);
        foreach($referral->sections as $section)
        {
            //dd($section->pivot->assigned_worker_id);
            //dd($section->pivot->assignedWorker);
        }

        return view('dashboard', compact('psWorkersCount', 'psCasesCount', 'months'));
    }
}
