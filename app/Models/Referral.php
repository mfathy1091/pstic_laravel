<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $guarded =[];


    public function referralSource()
    {
        return $this->belongsTo(ReferralSource::class);
    }
}
