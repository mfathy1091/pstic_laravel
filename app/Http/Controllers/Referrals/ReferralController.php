<?php

namespace App\Http\Controllers\Referrals;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Referral;
use App\Models\ReferralSource;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $referrals = Referral::all();
        $referralSources = ReferralSource::all();
        return view('pages.referrals.referrals', compact('referrals', 'referralSources'));
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
            $referral = new Referral();

            $referral->referral_source_id = $request->referral_source;
            $referral->referral_date = $request->referral_date;
            $referral->direct_beneficiary_name = $request->direct_beneficiary_name;

            $referral->save();
            toastr()->success('Added Successfuly');
            return redirect()->route('referrals.index');
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
            $referral = Referral::find($id);

            $referral->referral_date = $request->referral_date;
            $referral->direct_beneficiary_name = $request->direct_beneficiary_name;

            $referral->save();
            toastr()->success('Added Successfuly');
            return redirect()->route('referrals.index');
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
        Referral::findOrFail($request->id)->delete();
        return redirect()->route('referrals.index');
    }
}