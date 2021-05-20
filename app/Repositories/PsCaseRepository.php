<?php namespace App\Repositories;

use App\Models\DirectBeneficiary;
use App\Models\Gender;
use App\Models\Nationality;
use App\Models\PsCaseActivity;
use App\Models\PsCase;
use App\Models\PsTeam;

use App\Models\PsWorker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class PsCaseRepository implements PsCaseRepositoryInterface
{


    public function getAllPsCases()
    {
		return PsCase::all();
	}


    public function storePsCase($request)
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
            $this->insertDefaultMonthlyStatuses($psCase->id, $referralMonth);


            toastr()->success('Added Successfuly');
            return redirect()->route('pscases.index');

        }
        
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function insertDefaultMonthlyStatuses($psCaseID, $referralMonth)
    {
        // count of months starting with referral month to current month
        $monthsCount = date("m") - $referralMonth + 1;

        // array of months starting with referral month to current month
        for ($x = 0; $x < $monthsCount; $x++) {
            $months[$x] = $referralMonth + $x;
        }
        
        // insert to the table
        for ($x = 0; $x < $monthsCount; $x++) {
            if($x==0){
                $data[0] = [
                    'case_id' => $psCaseID,
                    'month_id' => $months[0],
                    'case_status_id' => '1',
                ];
            }else{
                $data[$x] = [
                    'case_id' => $psCaseID,
                    'month_id' => $months[$x],   // using id is wrong because feb id may not be 2
                    'case_status_id' => '2',
                ];
            }
        }

        DB::table('ps_case_activities')->insert($data);
    }




    public function getMonthCaseStatus($psCaseId, $monthId)
    {
        $psCaseActivity = PsCaseActivity::where('case_id', '=', $psCaseId)->where('month_id', '=', $monthId)->get();
        $status = $psCaseActivity[0]->caseStatus->name;

        return $status;
    }







}

