<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PssCase;
use App\Models\Employee;
use App\Models\Individual;
use App\Models\Month;
use App\Models\Referral;
use App\Models\Beneficiary;

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
        $julyBeneficiaries = Beneficiary::all();
        $julyBeneficiaries = Beneficiary::whereHas('record')->get();

        //$julyBeneficiaries = Beneficiary::whereHas('records', function($query){
        //    $query->where('month_id', '3');
        //})->get();

        //dd($julyBeneficiaries);


                // June PSS Cases
/*                 $pssCases = PssCase::with('records', 'beneficiaries')
                ->whereHas('records', function($query){
                    return $query->where('month_id', '6');
                })->get(); */
    
            // June PSS Beneficiaries with Ahmed
/*             $pssBeneficiaries = Beneficiary::with('records', 'pssCases')
                ->whereHas('pssCases', function($query){
                    return $query->where('assigned_psw_id', '3');
                })->whereHas('records', function($query){
                    return $query->where('moonth_id', '6');
                })
                ->get(); */




        $psWorkersCount = Employee::where('job_title_id', '1')->get()->count();
        $psCasesCount = PssCase::all()->count();

        $months = Month::with('referrals')
            ->where('name', 'June')
            ->get();
        

        return view('dashboard', compact('psWorkersCount', 'psCasesCount', 'months', 'julyBeneficiaries'));
    }
}
