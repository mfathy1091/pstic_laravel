<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable =['name'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }


    public function julyRecords()
    {
        return $this->hasMany(Record::class)->where('month_id', '6');
    }

    // public function user_referrals()
    // {
    //     return $this->hasMany(Referral::class)->where('user_id', auth()->id());
    // }

    // public function referrals()
    // {
    //     return $this->belongsToMany(Referral::class, 'month_referral', 'month_id', 'referral_id')
    //     ->withPivot(['case_status']);
    // }

}
