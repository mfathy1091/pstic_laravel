<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $guarded =[];


    // parent tables
    public function pssCase()
    {
        return $this->belongsTo(PssCase::class, 'pss_case_id');
    }
    

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }


    // child tables
    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }

    public function benefits()
    {
        return $this->hasMany(Benefit::class);
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }

/*     public function Beneficiaries()
    {
        return $this->belongsToMany(Beneficiary::class, 'records_beneficiaries', 'record_id', 'beneficiary_id');
    } */




    public function scopeNew($query)
    {
        $query->where('status_id', '1');
    }

    public function scopeMonth($query, $monthId)
    {
        $query->where('month_id', $monthId);
    }

    public function scopeMonths($query, $monthId)
    {
        $query->whereIn('month_id', $monthId);
    }

    public function scopeStatus($query, $statusId)
    {
        $query->where('status_id', $statusId);
    }


    public function scopeCurrentRecords($query, $monthId)
    {
        $query->whereIn('month_id', date("m"));
    }

}
