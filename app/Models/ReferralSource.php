<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralSource extends Model
{
    protected $fillable =['name'];


    public function referral(){
        return $this->hasOne(Referral::class);
    }
}
