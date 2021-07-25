<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function beneficiaries()
    {
        return $this->belongsToMany(Beneficiary::class, 'benefits_beneficiaries', 'benefit_id', 'beneficiary_id');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
