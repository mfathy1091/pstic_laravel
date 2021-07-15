<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PssCase;
use App\Models\Status;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //$statueses = DB::table('statuses')->select('name')->distinct()->get()->pluck('name');
        $statueses = Status::all();

        $pssCases = PssCase::query();

        if($request->filled('current_status_id'))
        {
            $pssCases->where('current_status_id', $request->current_status_id);                                         
        }

        return view('pss_cases.index2', [
            'statuses' => $statueses,
            'pssCases' => $pssCases->get(),
        ]);
    }

    public function store(Request $request)
    {
        return $request->all();
        return view('pss_cases.index2');
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





