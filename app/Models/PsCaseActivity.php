<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsCaseActivity extends Model
{
    protected $guarded =[];


    public function psCase()
    {
        return $this->belongsTo(PsCase::class, 'case_id');
    }


    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }


    public function caseStatus()
    {
        return $this->belongsTo(CaseStatus::class, 'case_status_id');
    }
}
