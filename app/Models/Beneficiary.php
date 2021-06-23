<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
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


    public function scopeWomen($query)
    {
        return $query->where('gender_id', 2);
    }



    public function scopeAgeRange($query, $from, $to)
    {
        return $query->whereBetween(['age', [$from, $to]]);
    }
}
