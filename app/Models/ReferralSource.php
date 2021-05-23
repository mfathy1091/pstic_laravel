<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralSource extends Model
{
    protected $fillable =['name'];


    public function ps_case(){
        return $this->hasOne(PsCase::class);
    }
}
