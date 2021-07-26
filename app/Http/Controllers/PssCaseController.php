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
use App\Models\Referral;
use App\Models\Record;
use App\Models\Status;
use App\Models\CaseType;
use App\Models\File;
use App\Models\Employee;
use App\Models\Service;
use App\Models\Reason;
use App\Models\Benefit;

class PssCaseController extends Controller
{

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





    public function create($id)
    {
        $referralSources = ReferralSource::all();
        $psWorkers = Employee::where('job_title_id', '1')->get();
        $genders = Gender::all();
        $nationalities = Nationality::all();
        $caseTypes = CaseType::all();
        $files = File::all();
        //$file = File::find($id);
        $individual = Individual::find($id);
        //dd($individual);

        $reasons = Reason::all();
        //dd($id);

		return view('pss_cases.create', compact('referralSources','psWorkers', 'genders', 'nationalities', 'caseTypes', 'files', 'individual', 'reasons'));
    }


    public function store(Request $request)
    {
        //dd($request);

        // validate if referradate is in future (reject it - it must be today or older)

        // insert Referral
        $referral = new Referral();
        $referral->direct_individual_id = $request->direct_individual_id;
        $referral->referral_source_id = $request->referral_source_id;
        $referral->referral_date = $request->referral_date;
        $referral->referring_person_name = $request->referring_person_name;
        $referral->referring_person_email = $request->referring_person_email;

        $referral->save();

        // insert Pss Case
        $pssCase = new PssCase();
        $pssCase->direct_individual_id = $request->direct_individual_id;
        $pssCase->file_id = $request->file_id;
        $pssCase->referral_id = $referral->id;
        $pssCase->current_status_id = '1';
        $pssCase->assigned_psw_id = Auth::id();

        $pssCase->save();

        // insert Beneficiaries
        
        return redirect()->route('individuals.show', [$request->input('direct_individual_id')]);








            
            // insert PS Case
            $psCase = new PssCase();
            $psCase->referral_date = $request->referral_date;
            $psCase->file_number = $request->file_number;
            $psCase->referral_source_id = $request->referral_source_id;
            $psCase->referring_person_name = $request->referring_person_name;
            $psCase->referring_person_email = $request->referring_person_email;
            $psCase->case_type_id = $request->case_type_id;
            $psCase->ps_worker_id = $request->ps_worker_id;

            if( $request->has('is_emergency')){
                $psCase->is_emergency = $request->is_emergency;
            }else{
                $psCase->is_emergency = "";
            }
            
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
            //dd($psCase);
            // insert direct beneficiary
            $directBeneficiary = new DirectBeneficiary();
            $directBeneficiary->name = $request->direct_beneficiary_name;
            $directBeneficiary->age = $request->direct_beneficiary_age;
            $directBeneficiary->gender_id = $request->gender_id;
            $directBeneficiary->nationality_id = $request->nationality_id;
            $directBeneficiary->ps_case_id = $psCase->id;
            $directBeneficiary->save();

            // insert default caseActivities
            $this->insertDefaultMonthlyStatuses($psCase->id, $referralMonth);

        // toastr()->success('Added Successfuly');




    
        /*  try {

        }
        
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } */
    }




    public function insertDefaultMonthlyStatuses($pssCaseID, $referralMonth)
    {
        // count number of months starting with referral month to current month
        $monthsCount = date("m") - $referralMonth + 1;

        // array of months starting with referral month to current month
        for ($x = 0; $x < $monthsCount; $x++) {
            $months[$x] = $referralMonth + $x;
        }
        
        // insert to the table
        for ($x = 0; $x < $monthsCount; $x++) {
            if($x==0){
                $data[0] = [
                    'month_id' => $months[0],
                    'pss_case_id' => $pssCaseID,
                    'status_id' => '1',
                    'is_emergency' => '0',
                ];
            }else{
                $data[$x] = [
                    'month_id' => $months[$x],   // using id is wrong because feb id may not be 2
                    'pss_case_id' => $pssCaseID,
                    'status_id' => '2',
                    'is_emergency' => '0',
                ];
            }
        }

        foreach ($data as $n) {
            Record::create($n);
        }
        //DB::table('records')->insert($data);
    }




    public function getMonthCaseStatus($pssCaseId, $monthId)
    {
        $record = Record::where('case_id', '=', $pssCaseId)
            ->where('month_id', '=', $monthId)->get();
        $status = $record[0]->caseStatus->name;

        return $status;
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





















    
    public function show($id)
    {


        $pssServices = Service::where('type', 'Psychosocial')->get();

        $pssCase = PssCase::find($id);
        $referral = $pssCase->referral;
        $records = $pssCase->records;

        $beneficiaries = $pssCase->records;

        $julyRecord = Record::where('month_id', '7')
            ->where('pss_case_id', $pssCase->id)->first();
        
        //dd($julyRecord);
        $beneficiaries = $julyRecord->beneficiaries;

        //dd($beneficiary->benefits->first()->service->name);
        //dd($beneficiary->benefits);
        
        //foreach($beneficiary->benefits as $benefit){
            //dd($benefit->service->name);
        //}

        return view('pss_cases.show', compact('pssCase', 'referral', 'records', 'beneficiaries', 'pssServices'));

    }

    
}