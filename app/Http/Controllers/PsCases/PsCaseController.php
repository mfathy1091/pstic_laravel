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
    public function index()
    {
        $psCases = $this->repository->getAllPsCases();
        $referralSources = ReferralSource::all();
        $psWorkers = PsWorker::all();
        $genders = Gender::all();
        $nationalities = Nationality::all();
        return view('pages.ps_cases.ps_cases', compact('psCases', 'referralSources', 'psWorkers', 'genders', 'nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            // insert direct beneficiary
            $directBeneficiary = new DirectBeneficiary();
            $directBeneficiary->name = $request->direct_beneficiary_name;
            $directBeneficiary->age = $request->direct_beneficiary_age;
            $directBeneficiary->gender_id = $request->gender_id;
            $directBeneficiary->nationality_id = $request->nationality_id;
            $directBeneficiary->save();
            
            // insert PS Case
            $psCase = new PsCase();
            $psCase->direct_beneficiary_id = $directBeneficiary->id;

            $psCase->file_number = $request->file_number;
            $psCase->referral_source_id = $request->referral_source_id;
            $psCase->referral_date = $request->referral_date;
            $psCase->ps_worker_id = $request->ps_worker_id;

            if( $request->has('is_emergency')){
                $psCase->is_emergency = $request->is_emergency;
            }else{
                $psCase->is_emergency = "";
            }
            
            // validate if referradate is in future (reject it - it must be today or older)


            // initialize default current case status
            $referralDate = $request->referral_date;
            $ConvertedReferralDate = strtotime($referralDate);
            $referralMonth = date("m", $ConvertedReferralDate);
            

            if(date("m") == $referralMonth){
                $psCase->case_status_id = '1';  // new
            }
            elseif(date("m") > $referralMonth){
                $psCase->case_status_id = '2';  // inctive
            }

            $psCase->save();

            // add default caseActivities
            $this->repository->insertDefaultMonthlyStatuses($psCase->id, $referralMonth);


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