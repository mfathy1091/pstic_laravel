<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsCase extends Model
{
    protected $guarded =[];

    // parent tables
    public function referralSource()
    {
        return $this->belongsTo(ReferralSource::class, 'referral_source_id');
    }

    public function caseType()
    {
        return $this->belongsTo(CaseType::class, 'case_type_id');
    }

    public function caseStatus()
    {
        return $this->belongsTo(CaseStatus::class, 'case_status_id');
    }

    public function psWorker()
    {
        return $this->belongsTo(PsWorker::class, 'ps_worker_id');
    }



    // child tables
    public function directBeneficiary()
    {
        return $this->hasOne(DirectBeneficiary::class);
    }

    public function psCaseActivities()
    {
        return $this->hasMany(PsCaseActivity::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function ReferralReasons()
    {
        return $this->hasMany(ReferralReason::class);
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
