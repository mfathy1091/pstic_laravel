<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ReferralSection extends Pivot
{
    protected $table="referral_sections";

    public function assignedWorker(){
        return $this->belongsTo(Employee::class, 'assigned_worker_id');
    }

    public function directBeneficiary(){
        return $this->belongsTo(Beneficiary::class, 'direct_beneficiary_id');
    }

    public function currentStatus(){
        return $this->belongsTo(CaseStatus::class, 'current_status_id');
    }

}


