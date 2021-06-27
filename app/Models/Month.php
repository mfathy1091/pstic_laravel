<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable =['name'];


    public function user_referrals()
    {
        return $this->hasMany(Referral::class)->where('user_id', auth()->id());
    }

    public function referrals()
    {
        return $this->belongsToMany(Referral::class, 'month_referral', 'month_id', 'referral_id')
        ->withPivot(['case_status']);
    }


    public function pssCaseActivities()
    {
        return $this->hasMany(PssCaseActivity::class)->where('month_id', '6');
    }


}
