<?php

namespace App\Http\Controllers\FollowUp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FollowUp;

class FollowUpController extends Controller
{

    
    public function store(Request $request)
    {

        $data = request()->validate([
            'pss_case_id' => 'required',
            'record_id' => 'required',
            'follow_up_date' => 'required',
            'comment' => 'required',
        ]);
            
        //dd($request);
            
        $followUp = FollowUp::create($data);
            
        return redirect()->back();
    }
    
    
    public function destroy($id)
    {
        FollowUp::findOrFail($id)->delete();
        return redirect()->back();
    }
}
