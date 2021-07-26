<?php

namespace App\Http\Controllers\Beneficiary;

use App\Http\Controllers\Controller;
use App\Models\Beneficiary;
use App\Models\Record;
use App\Models\PssCase;

use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiaries = Beneficiary::all();

        $julyCases = PssCase::whereHas('records', function($query){
            $query->where('month_id', '07');
        });


        return view('beneficiaries.index', compact('beneficiaries'));
    }
}



/* $beneficiaries = Beneficiary::all();
$july = Month::where('numerical', '07-2021');

$julyRecord = Record::where();


$julyBeneficiaries = Beneficiary::whereHas('records', function($query){
    $query->where('month_id', '07-2021');
});
 */