<?php namespace App\Repositories;

use App\Models\Gender;
use App\Models\Nationality;
use App\Models\PsCaseActivity;
use App\Models\PsTeam;

use App\Models\PsWorker;
use Illuminate\Support\Facades\Hash;

class PsCaseRepository extends PsCaseRepositoryInterface
{



    public function getMonthCaseStatus($psCaseId, $monthId)
    {
        $psCaseActivity = PsCaseActivity::where('case_id', '=', $psCaseId)->where('month_id', '=', $monthId)->get();
        $status = $psCaseActivity[0]->caseStatus->name;

        return $status;
    }



    public function storePsCase($request)
    {
        $currentMonthId = '5';
        $psCase = new PsCase();
        $currentMonthStatus = getMonthCaseStatus(, $currentMonthId);
        
        
        try {
            //$validated = $request->validated();
            $psCase = new PsCase();

            $psCase->referral_source_id = $request->referral_source;
            $psCase->referral_date = $request->referral_date;
            $psCase->direct_beneficiary_name = $request->direct_beneficiary_name;
            $psCase->ps_worker_id = $request->ps_worker_id;

            if( $request->has('is_emergency')){
                $psCase->is_emergency = $request->is_emergency;
            }else{
                $psCase->is_emergency = "";
            }

            $psCase->case_status_id = $request->ps_worker_id;

            $psCase->save();
            toastr()->success('Added Successfuly');
            return redirect()->route('pscases.index');
        }
        
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function initiateCaseStatus(){
        // New
        if($currentMonth == $referralMonth){
            return '1';
        }

        // Ongoing
        if($currentMonth != $referralMonth && !is_null($currentMonth->visits)){
            return '2';
        }
    }

    public function storePsCase($request)
    {

    }


    public function getAll()
    {
		return PsCase::all();
	}


}


        $referralMonth = $referral_date.getMonth();
        
        // New
        if($currentMonth == $referralMonth){
            return '1';
        }

        // Ongoing
        if($currentMonth != $referralMonth && !is_null($currentMonth->visits)){
            return '2';
        }

        $referralMonth = $referral_date.getMonth();