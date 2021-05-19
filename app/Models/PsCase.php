<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsCase extends Model
{
    protected $guarded =[];


    public function referralSource()
    {
        return $this->belongsTo(ReferralSource::class);
    }

    public function psWorker()
    {
        return $this->belongsTo(PsWorker::class, 'ps_worker_id');
    }

    public function caseStatus()
    {
        return $this->belongsTo(CaseStatus::class, 'case_status_id');
    }

    public function directBeneficiary()
    {
        return $this->belongsTo(DirectBeneficiary::class, 'direct_beneficiary_id');
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
    

    public function psCaseActivities()
    {
        return $this->hasMany(PsCaseActivity::class, 'case_id');
    }

}
