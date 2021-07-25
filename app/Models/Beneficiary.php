<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;


    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function individual()
    {
        return $this->belongsTo(Individual::class, 'individual_id');
    }

    public function pssCase()
    {
        return $this->belongsTo(PssCase::class, 'pss_case_id');
    }

    public function record()
    {
        return $this->belongsTo(Record::class, 'record_id');
    }

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }

    // public function benefits()
    // {
    //     return $this->belongsToMany(Benefit::class, 'benefits_beneficiaries', 'beneficiary_id', 'benefit_id');

    // }

    // public function records()
    // {
    //     return $this->belongsToMany(Record::class, 'records_beneficiaries', 'beneficiary_id', 'record_id');
    // }

}
