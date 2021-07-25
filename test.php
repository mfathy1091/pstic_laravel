<?php

use App\Models\Beneficiary;
use Facade\Ignition\QueryRecorder\Query;

class test extends{


}


// July Beneficiaries
$julyRecord = Record::find(7);
$julyBeneficiaries = Beneficiaries::whereHas('records', function($query){
    query->where('month_id', '072021');
});

// 072021
// 082021


//PSS Case
$pssCase = PssCase::find(1);
$records = $pssCase->records;
foreach($records as $record)
{
    $beneficiaries = $record->beneficiaries;
    foreach($beneficiaries as $beneficiary)
    {
        $beneficiary->benefits;
        $beneficiary->vulnerabilities;
        $beneficiary->visits;
    }
}



