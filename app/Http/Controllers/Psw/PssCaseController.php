<?php

namespace App\Http\Controllers\Psw;

use App\Http\Controllers\Controller;
use App\Repositories\PsCaseRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Gender;

use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\PsCase;
use App\Models\PssCase;
use App\Models\ReferralSource;
use App\Models\File;
use App\Models\DirectBeneficiary;
use App\Models\PsCaseActivity;
use App\Models\PssStatus;
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
        $employee = Auth::user()->employee;


        $psWorkersIds = Employee::where('job_title_id', '1')->pluck('id');
        if(!$psWorkersIds->contains($employee->id)){

            dd('You are not a PS Worker!');
            return redirect('/');
        }


        
        $worker = Auth::user()->employee;

        $pssCases = PssCase::where('assigned_psw_id', $worker->id)
            ->get();

        $tabs = array();

        $tabs[0] = ['name' => 'All', 'cases' => $pssCases];

        $pssStatuses = PssStatus::all();
        
        $i = 1;
        foreach($pssStatuses as $pssStatus){
            $statusName = $pssStatus->name;
            $statusId = $pssStatus->id;
            $cases = $pssCases->where('current_pss_status_id', '=', $statusId);
            $tabs[$i] = ['name' => $statusName, 'cases' => $cases];
            $i++;
        }


        

		return view('psw.pss_cases.index', compact('tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        $referralSources = ReferralSource::all();
        $psWorkers = Employee::where('job_title_id', '1')->get();
        $genders = Gender::all();
        $nationalities = Nationality::all();
        $caseTypes = CaseType::all();
        $files = File::all();
        $file = File::find($id);
        //dd($id);

		return view('psw.pss_cases.create', compact('referralSources','psWorkers', 'genders', 'nationalities', 'caseTypes', 'files', 'file'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->psCaseRepo->storePsCase($request);

        toastr()->success('Added Successfuly');
        return redirect()->route('pscases.index');

    
/*         try {
 

        }
        
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } */
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

        try {
            //$validated = $request->validated();
            $psCase = PsCase::find($id);

            $psCase->referral_date = $request->referral_date;
            $psCase->direct_beneficiary_name = $request->direct_beneficiary_name;

            $psCase->save();
            toastr()->success('Added Successfuly');
            return redirect()->route('pscases.index');
        }
        
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, $id)
    {
        PsCase::findOrFail($request->id)->delete();
        return redirect()->route('pscases.index');
    }
}