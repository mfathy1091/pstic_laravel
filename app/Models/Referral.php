<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $guarderd = [];

    // Parent Tables
    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
    
    public function referralSource()
    {
        return $this->belongsTo(ReferralSource::class, 'referral_source_id');
    }



    // Child tables
    public function pssCase()
    {
        return $this->hasOne(PssCase::class);
    }

    public function activeReferrals()
    {
        return $this->hasOne(PssCase::class);
    }

    public function userPssCases()
    {
        return $this->hasMany(PssCase::class)->where('assigned_psw_id', auth()->id());
    }


    public function reasons()
    {
        return $this->belongsToMany(Reason::class, 'referral_reasons', 'referral_id', 'reason_id');
    }


    // pivot tables
    public function months()
    {
        return $this->belongsToMany(Month::class, 'month_referral', 'month_id', 'referral_id')
        ->withPivot(['case_status']);
    }

    public function sections()
    {
        return $this->belongstoMany(Section::class, 'referral_sections', 'referral_id', 'section_id')
        ->withPivot(['assigned_worker_id', 'direct_beneficiary_id', 'current_status_id'])
        ->using(ReferralSection::class);
    }



    
}




