<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    use HasFactory;

    public function individual()
    {
        return $this->belongsTo(Individual::class, 'individual_id');
    }

    public function benefits()
    {
        return $this->belongsToMany(Benefit::class, 'benefits_beneficiaries', 'benefit_id', 'beneficiary_id');

    }

    public function records()
    {
        return $this->belongsToMany(Record::class, 'records_beneficiaries', 'record_id', 'beneficiary_id');

    }
}
