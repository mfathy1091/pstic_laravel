<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PssCaseActivity extends Model
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

    public function pssStatus()
    {
        return $this->belongsTo(PssStatus::class, 'pss_status_id');
    }




    public function scopeNew($query)
    {
        $query->where('pss_status_id', '1');
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
        $query->where('pss_status_id', $statusId);
    }




}
