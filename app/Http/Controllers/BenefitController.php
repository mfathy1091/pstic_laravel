<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;

class BenefitController extends Controller
{
    public function store(Request $request)
    {

        $data = request()->validate([
            'pss_case_id' => 'required',
            'service_id' => 'required',
            'record_id' => 'required',
            'provide_date' => 'required',
        ]);
            
                        
        $benefit = Benefit::create($data);

        $d = $request->input('beneficiaries');

        //dd($d);

        $benefit->beneficiaries()->attach($d);
            
        return redirect()->back();
    }



    public function destroy($id)
    {
        Benefit::findOrFail($id)->delete();
        return redirect()->back();
    }

}
