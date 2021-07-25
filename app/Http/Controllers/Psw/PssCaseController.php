<?php

namespace App\Http\Controllers\Psw;

use App\Http\Controllers\Controller;
use App\Repositories\PsCaseRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Gender;

use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\PssCase;
use App\Models\ReferralSource;
use App\Models\File;
use App\Models\Reason;
use App\Models\PsCaseActivity;
use App\Models\Status;
use App\Models\CaseType;
use App\Models\Team;
use App\Models\Employee;
use App\Models\JobTitle;

class PssCaseController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // permissions
/*         $employee = Auth::user()->employee;


        $psWorkersIds = Employee::where('job_title_id', '1')->pluck('id');
        if(!$psWorkersIds->contains($employee->id)){

            dd('You are not a PS Worker!');
            return redirect('/');
        } */


        
        $worker = Auth::user()->employee;

        $pssCases = PssCase::where('assigned_psw_id',  Auth::user()->id)
            ->get();

        $tabs = array();

        $tabs[0] = ['name' => 'All', 'cases' => $pssCases];

        $statuses = Status::all();
        
        $i = 1;
        foreach($statuses as $status){
            $statusName = $status->name;
            $statusId = $status->id;
            //$cases = $pssCases->where('current_status_id', '=', $statusId);
            $cases = PssCase::whereHas('records', function($query) use($statusId) {
                return $query->where('status_id', 1)->where('month_id', 7);
            })->get();
            $tabs[$i] = ['name' => $statusName, 'cases' => $cases];
            $i++;
        } 

        

		return view('psw.pss_cases.index', compact('tabs'));
    }




/*     public function store(Request $request)
    {
        //dd($request);
        $this->psCaseRepo->storePsCase($request);

        toastr()->success('Added Successfuly');
        return redirect()->route('pscases.index');

    
       try {
 

        }
        
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } 
    } */


}