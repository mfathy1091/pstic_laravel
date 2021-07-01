<?php

namespace App\Http\Controllers\PssCase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PsCaseRepositoryInterface;
use App\Models\PssCase;
use App\Models\ReferralSource;
use App\Models\PsWorker;
use App\Models\Status;
use App\Models\CaseType;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\Team;
use App\Models\Budget;

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


        $i = 0;
        foreach($statuses as $statuse){
            $statusName = $statuses->name;
            $statusId = $statuses->id;
            $cases = $pssCases->where('current_status_id', '=', $statusId);
            $tabs[$i] = ['name' => $statusName, 'cases' => $cases];
            $i++;
        }

        $referralSources = ReferralSource::all();
        $psWorkers = PsWorker::all();
        $genders = Gender::all();
        $nationalities = Nationality::all();
        
        $teams = Team::where('department_id', '1')->get();
        $budgets = Budget::all();


        //dd($psCases);
		return view('ps_cases.all_cases.index', compact('tabs','psWorkers', 'genders', 'nationalities', 'teams', 'budgets'));
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

		return view('ps_cases.all_cases.create', compact('referralSources','psWorkers', 'genders', 'nationalities', 'caseTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->repository->storePsCase($request);

        toastr()->success('Added Successfuly');
        return redirect()->route('pscases.allcases.index');

    
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
        $psCase = PssCase::find($id);

        return view('pss_cases.all_cases.show', compact('psCase'));
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
            $psCase = PssCase::find($id);

            $psCase->referral_date = $request->referral_date;
            $psCase->direct_beneficiary_name = $request->direct_beneficiary_name;

            $psCase->save();
            toastr()->success('Added Successfuly');
            return redirect()->route('pscases.allcases.index');
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
        return redirect()->route('pscases.allcases.index');
    }
}