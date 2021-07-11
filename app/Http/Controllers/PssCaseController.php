<?php

namespace App\Http\Controllers;

use App\Models\Individual;
use App\Repositories\PsCaseRepositoryInterface;
use Illuminate\Support\Facades\Auth;use App\Models\Gender;

use App\Models\Nationality;
use Illuminate\Http\Request;
use App\Models\PsCase;
use App\Models\PssCase;
use App\Models\ReferralSource;
use App\Models\PsWorker;
use App\Models\MonthlyRecord;
use App\Models\Status;
use App\Models\CaseType;
use App\Models\Team;
use App\Models\Employee;
use App\Models\Service;
use App\Models\JobTitle;
use App\Models\ServiceRecord;

class PssCaseController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $pssCases = PssCase::all();

        $tabs = array();
        $statuses = Status::all();

        $tabs[0] = ['name' => 'All', 'cases' => $pssCases];

        $i = 1;
        foreach($statuses as $status){
            $statusName = $status->name;
            $statusId = $status->id;
            $cases = $pssCases->where('current_status_id', '=', $statusId);
            $tabs[$i] = ['name' => $statusName, 'cases' => $cases];
            $i++;
        }

		return view('pss_cases.index', compact('tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $referralSources = ReferralSource::all();
        $psWorkers = Employee::where('job_title_id', '1')->get();
        $genders = Gender::all();
        $nationalities = Nationality::all();
        $caseTypes = CaseType::all();

		return view('pss_cases.create', compact('referralSources','psWorkers', 'genders', 'nationalities', 'caseTypes'));
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


        $services = Service::where('type', 'Psychosocial')->get();

        $pssCase = PssCase::find($id);
        $referral = $pssCase->referral;
        $monthlyRecords = $pssCase->monthlyRecords;

        $beneficiaries = $pssCase->beneficiaries;

        //dd($beneficiary->serviceRecords->first()->service->name);
        //dd($beneficiary->serviceRecords);
        
        //foreach($beneficiary->serviceRecords as $serviceRecord){
            //dd($serviceRecord->service->name);
        //}

        return view('pss_cases.show', compact('pssCase', 'referral', 'monthlyRecords', 'beneficiaries', 'services'));

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
        PssCase::findOrFail($request->id)->delete();
        return redirect()->route('psscases.index');
    }
}