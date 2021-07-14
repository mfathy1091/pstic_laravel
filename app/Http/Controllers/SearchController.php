<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\PssCase;
use App\Models\Status;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $statueses = Status::table('statuses')->select('name')->distinct()->get()->pluck('name');

        $pssCases = PssCase::query();

        if($request->filled('statuses'))
        {
            $pssCases->where('current_status_id', 1);
        }

        return view('psw.pss_cases.index', [
            'statuses' => $statueses,
            'pssCases' => $pssCases->get(),
        ]);
    }

    public function store(Request $request)
    {
        return $request->all();
        return view('psw.pss_cases.index')
    }
}
