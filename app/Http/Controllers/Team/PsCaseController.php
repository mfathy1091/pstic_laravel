<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Repositories\PsCaseRepositoryInterface;
use Illuminate\Support\Facades\Auth;use App\Models\Gender;

use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\PsCase;
use App\Models\ReferralSource;
use App\Models\PsWorker;
use App\Models\PsCaseActivity;
use App\Models\Status;
use App\Models\CaseType;
use App\Models\User;
use App\Models\Employee;

class PsCaseController extends Controller
{
/*     private $psCaseRepo;

    public function __construct(PsCaseRepositoryInterface $psCaseRepo)
	{
        $this->psCaseRepo = $psCaseRepo;
	} */


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        //cases for workers in a specifiteam
        
        $worker = Auth::user()->employee;
        $teamId = $worker->team->id;

        $psWorkersIds = Employee::where('team_id', $teamId)->pluck('id');


        $psCases = PsCase::with('referralSource', 'caseType', 'psWorker', 'directBeneficiary', 'psCaseActivities', 'visits')
            ->whereIn('ps_worker_id', $psWorkersIds)
            ->get();



        $tabs = array();
        $statuses = Status::all();

        $i = 0;
        foreach($statuses as $status){
            $statusName = $status->name;
            $statusId = $status->id;
            $cases = $psCases->where('case_status_id', '=', $statusId);
            $tabs[$i] = ['name' => $statusName, 'cases' => $cases];
            $i++;
        }

        $referralSources = ReferralSource::all();
        $psWorkers = PsWorker::all();
        $genders = Gender::all();
        $nationalities = Nationality::all();
        

		return view('ps_cases.team_cases.index', compact('tabs','psWorkers', 'genders', 'nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $referralSources = ReferralSource::all();
        $psWorkers = PsWorker::all();
        $genders = Gender::all();
        $nationalities = Nationality::all();
        $caseTypes = CaseType::all();

		return view('pages.ps_cases.create', compact('referralSources','psWorkers', 'genders', 'nationalities', 'caseTypes'));
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