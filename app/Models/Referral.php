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

    public function user_referrals()
    {
        return $this->hasMany(Referral::class)->where('user_id', auth()->id());
    }


    public function months()
    {
        return $this->belongsToMany(Month::class, 'month_referral', 'month_id', 'referral_id')
        ->withPivot(['case_status']);

    }



    
}




