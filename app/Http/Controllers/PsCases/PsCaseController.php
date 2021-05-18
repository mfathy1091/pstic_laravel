<?php

namespace App\Http\Controllers\PsCases;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PsCase;
use App\Models\ReferralSource;
use App\Models\PsWorker;

class PsCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        $psCases = PsCase::all();
        $referralSources = ReferralSource::all();
        $psWorkers = PsWorker::all();
        return view('pages.ps_cases.ps_cases', compact('psCases', 'referralSources', 'psWorkers'));
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
        //$name = $request->input('name');
        //dd($request);
        //$referralSource = ReferralSource::where(['referral_source'=>($request->referral_source)])->firstOrFail();
        //dd($referralSource);

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


            $psCase->save();
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