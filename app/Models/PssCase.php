<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PssCase extends Model
{

    protected $guarded =[];

    // parent tables
    public function referral()
    {
        return $this->belongsTo(Referral::class, 'referral_id');
    }

    public function currentCaseStatus()
    {
        return $this->belongsTo(CaseStatus::class, 'current_case_status_id');
    }

    public function assignedPsw()
    {
        return $this->belongsTo(Employee::class, 'assigned_psw_id');
    }



    // child tables
    public function directBeneficiary()
    {
        return $this->hasOne(Beneficiary::class)->direct();;
    }

    public function beneficiariesIndirect()
    {
        return $this->hasMany(Beneficiary::class)->indirect();
        // or this way:
        // return $this->posts()->published();
    }


    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }


    public function currentStatus()
    {
        $status = PsCaseActivity::with('caseStatus', 'month')
        ->where('month_id', date('n'))
        ->get()
        ->map(function ($psCaseActivity){
            return[
                'currentStatus' => $psCaseActivity->caseStatus->name,
                'currentMonth' => $psCaseActivity->month->name,
            ];
        });

        return $status[0]['currentStatus'];
    }

}