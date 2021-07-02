<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    use HasFactory;

    public function individuals()
    {
        return $this->belongsToMany(Individual::class, 'service_record_beneficiaries', 'service_record_id', 'individual_id');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
