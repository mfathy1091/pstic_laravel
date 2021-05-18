<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectBeneficiary extends Model
{
    protected $guarded=[];


    public function nationality()
    {
        return $this->belongsTo('App\Models\Nationality', 'nationality_id');
    }

    
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender', 'gender_id');
    }
}
