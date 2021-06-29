<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    public const PSYCHOSOCIAL = 1;
    public const HOUSING = 2;



    public function referrals()
    {
        return $this->belongstoMany(Referral::class, 'referral_sections', 'referral_id', 'section_id')
        ->withPivot(['assigned_worker_id', 'direct_beneficiary_id', 'current_status_id'])
        ->using(ReferralSection::class);
    }
}
