<?php

namespace App\Http\Controllers\PsCases;

use App\Repositories\PsCaseRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\PsCase;
use App\Models\ReferralSource;
use App\Models\PsWorker;
use App\Models\DirectBeneficiary;
use App\Models\PsCaseActivity;
use App\Models\CaseStatus;
use App\Models\PsTeam;

class PsCaseController extends Controller
{
    private $repository;

    public function __construct(PsCaseRepositoryInterface $repository)
	{
        $this->repository = $repository;
	}


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $psCases = PsCase::with('referralSource', 'caseType', 'psWorker', 'directBeneficiary', 'psCaseActivities', 'visits')->get();

        $tabs = array();
        $caseStatuses = CaseStatus::all();

        $i = 0;
        foreach($caseStatuses as $caseStatus){
            $statusName = $caseStatus->name;
            $statusId = $caseStatus->id;
            $cases = $psCases->where('case_status_id', '=', $statusId);
            $tabs[$i] = ['name' => $statusName, 'cases' => $cases];
            $i++;
        }

        $referralSources = ReferralSource::all();
        $psWorkers = PsWorker::all();
        $genders = Gender::all();
        $nationalities = Nationality::all();

        return view('pages.ps_cases.index')->with('tabs', $tabs);
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

		return view('pages.ps_cases.create',compact('referralSources','psWorkers', 'genders', 'nationalities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request);
    
        try {
 
            $this->repository->storePsCase($request);

            toastr()->success('Added Successfuly');
            return redirect()->route('pscases.index');

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