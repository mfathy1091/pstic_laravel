<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\PsCase;
use App\Models\Employee;
use App\Models\Beneficiary;
use App\Models\Month;

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
        $psWorkersCount = Employee::where('job_title_id', '1')->get()->count();
        $psCasesCount = PsCase::all()->count();

        $months = Month::with('referrals')
            ->where('name', 'June')
            ->get();

        return view('dashboard', compact('psWorkersCount', 'psCasesCount', 'months'));
    }
}
