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
use App\Models\MonthlyRecord;
use App\Models\Status;
use App\Models\CaseType;
use App\Models\File;
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
            // validate if referradate is in future (reject it - it must be today or older)

            // insert Referral
            $referralData = request()->validate([
                'file_id' => 'required',
                'referral_code' => '',
                'referral_source' => 'required',
                'referral_date' => 'required',
                'referring_person_name' => 'required',
                'referring_person_email' => 'required',
            ]);
            $referral = Referral::create($referralData);

            // insert PSS Case
            $fileData = request()->validate([
                'file_id' => 'required',
                'referral_id' => 'required',
                'referral_source' => 'required',
                'referral_date' => 'required',
                'referring_person_name' => 'required',
                'referring_person_email' => 'required',
            ]);
            $file = File::create($fileData);






            
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













        toastr()->success('Added Successfuly');
        return redirect()->back();

    
/*         try {
 
        }
        
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        } */
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
                    'ps_case_id' => $psCaseID,
                    'month_id' => $months[0],
                    'case_status_id' => '1',
                ];
            }else{
                $data[$x] = [
                    'ps_case_id' => $psCaseID,
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
        return redirect()->back();
    }
}