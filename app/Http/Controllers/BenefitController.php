<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;
use App\Models\Benefit;

class BenefitController extends Controller
{
    public function store(Request $request)
    {
        
        foreach($request->input('services') as $service){
            Benefit::create([
                'beneficiary_id' => $request->input('beneficiary_id'),
                'service_id' => $service
            ]);
        }
            
        return redirect()->back();
    }



    public function destroy($id)
    {
        Benefit::findOrFail($id)->delete();
        return redirect()->back();
    }

}
